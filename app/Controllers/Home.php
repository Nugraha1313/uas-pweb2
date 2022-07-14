<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            echo '<script>alert("Silahkan Login Terlebih Dahulu");document.location.href = "login"</script>';
        }
        $data = [
            'title' => 'Home'
        ];

        return view('home', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
}
