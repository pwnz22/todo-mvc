<?php

class Home extends Controller
{
    public function index()
    {
        $sort_order = isset($_GET['sort']) && strtolower($_GET['sort']) == 'asc' ? 'desc' : 'asc';
        $todos = Todo::query();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if (isset($_GET['sortby'])) {
            $todos = $todos->orderBy($_GET['sortby'], $sort_order);
        }

        $this->view('home/index', [
            'todos' => $todos->paginate(2, ['*'], 'page', $page),
            'sort_order' => $sort_order
        ]);
    }
}