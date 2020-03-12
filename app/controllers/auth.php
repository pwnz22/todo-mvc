<?php

class Auth extends Controller
{
    protected $auth;

    public function __construct()
    {
        $db = new \Delight\Db\PdoDsn('mysql:dbname=mvc;host=localhost;charset=utf8', 'root', '');
        $this->auth = new \Delight\Auth\Auth($db);
    }

    public function index()
    {
        if ($this->auth->isLoggedIn()) {
            header('Location: /');
        }

        $this->view('auth/index');
    }

    public function login()
    {
        try {
            $this->auth->loginWithUsername($_POST['name'], $_POST['password']);

            $this->msg()->success('Авторизация прошла успешно.', '/');
        }
        catch (\Delight\Auth\EmailOrUsernameRequiredError $e) {
            $this->msg()->error('Неравильный пользователь или пароль', '/auth');
        }
        catch (\Delight\Auth\UnknownUsernameException $e) {
            $this->msg()->error('Неравильный пользователь или пароль', '/auth');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            $this->msg()->error('Неравильный пользователь или пароль', '/auth');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $this->msg()->error('Неравильный пользователь или пароль', '/auth');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function logout()
    {
        $this->auth->logOut();

        $this->msg()->success('Вы успешно вышли.', '/');
    }
}