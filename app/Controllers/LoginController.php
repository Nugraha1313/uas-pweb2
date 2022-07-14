<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        session();
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('home'));
        }
        echo view('../Views/auth/login.php');
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $credentials = ['username' => $username];

        $user = $this->model->where($credentials)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Username anda salah.');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (!$passwordCheck) {
            session()->setFlashdata('error', 'Password anda salah.');
            return redirect()->back();
        }

        $userData = [
            'id' => $user['id'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'password' => $user['password'],
            'foto' => $user['foto'],
            'email' => $user['email'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('home'));
    }
}