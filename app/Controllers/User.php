<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function registrasi()
    {
        session();
        $data = [
            'title' => 'Register',
            'validation' => Services::validation()
        ];
        return view('registrasi', $data);
    }

    public function registerSave()
    {
        // Validation rules
        $rules = [
            'email' => [
                'rules' => "required|valid_email|is_unique[accounts.email]",
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => "Email not valid",
                    'is_unique' => "Email has been registered"
                ]
            ],
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'nama' => 'required|min_length[5]|max_length[255]',
            'username' => 'required|min_length[7]|max_length[20]|is_unique[accounts.username]',
            'imageFile' => [
                'rules' => 'uploaded[imageFile]|max_size[imageFile,1024]|is_image[imageFile]|mime_in[imageFile,image/jpg,image/jpeg,image/png]',
            ]
        ];

        if ($this->validate($rules)) {
            $image = $this->request->getFile('imageFile');
            $newName = $image->getRandomName();
            $image->move('users', $newName);
            // Get Data
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'nama' => $this->request->getPost('nama'),
                'foto' => $newName,
                'username' => $this->request->getPost('username')

            ];

            // Submit data
            $this->userModel->save($data);

            // Redirect to Login Page
            return redirect()->to('/login');
        } else {
            // Send error message to Register Page
            return redirect()->to(base_url('registrasi'))->withInput();
        }
    }
}