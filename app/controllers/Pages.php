<?php

class Pages extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $this->view('pages/about');
    }

    public function users()
    {
        $users = $this->userModel->getAll();
        $this->view('pages/users', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public function user($user_id)
    {
        $user = $this->userModel->findByPrimayKey($user_id);
        $this->view('pages/user', [
            'tilte' => 'First user',
            'user' => $user
        ]);
    }
}