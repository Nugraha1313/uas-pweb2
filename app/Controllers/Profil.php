<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            echo '<script>alert("Silahkan Login Terlebih Dahulu");document.location.href = "login"</script>';
        }
        $data = [
            'title' => 'Profil'
        ];

        return view('profil', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
    
}