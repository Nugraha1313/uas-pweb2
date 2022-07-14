<?php

namespace App\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        $userData = [
            'id',
            'nama',
            'email',
            'username',
            'foto',
            'password',
            'logged_in'
        ];

        session()->remove($userData);
        return redirect()->to(base_url('login'));
    }

}
