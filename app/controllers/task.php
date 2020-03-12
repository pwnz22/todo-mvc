<?php

class Task extends Controller
{
    public function create()
    {
        $this->view('task/create');
    }

    public function edit($id)
    {
        if (!$this->auth()->isLoggedIn() && !$this->auth()->hasRole(\Delight\Auth\Role::ADMIN)) {
            $this->msg()->error('У вас нет доступа для редактирования', '/');
        }

        $todo = Todo::find($id);

        $this->view('task/edit', ['todo' => $todo]);
    }

    protected function validate()
    {
        if (isset($_POST['username']) && $_POST['username'] === '') {
            $this->msg()->error('Заполните поле имя пользователя', '/task/create');
        }

        if (isset($_POST['email']) && $_POST['email'] === '') {
            $this->msg()->error('Заполните поле email', '/task/create');
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->msg()->error('Неправильный email', '/task/create');
        }

        if (isset($_POST['content']) && $_POST['content'] === '') {
            $this->msg()->error('Заполните текст задачи', '/task/create');
        }
    }

    public function update($id)
    {
        $this->validate();

        if (!$this->auth()->isLoggedIn() && !$this->auth()->hasRole(\Delight\Auth\Role::ADMIN)) {
            $this->msg()->error('У вас нет доступа для редактирования', '/');
        }

        $todo = Todo::find($id);

        if ($todo->content != $_POST['content']) {
            $todo->update(['by_admin' => true]);
        }

        $todo->update([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'content' => $_POST['content'],
            'status' => isset($_POST['status'])
        ]);

        $this->msg()->success('Задача успешно отредактировано.', '/');
    }

    public function store()
    {
        $this->validate();

        Todo::create([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'content' => $_POST['content']
        ]);

        $this->msg()->success('Задача успешно создана.', '/');
    }
}