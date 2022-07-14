<?php
namespace App\Controllers;
use App\Models\UserModel;
use Config\Services;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\isTrue;

class EditProfil extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (!$this->isLoggedIn()) {
            echo '<script>alert("Silahkan Login Terlebih Dahulu");document.location.href = "login"</script>';
        }

        $data = [
            'title' => 'Edit Profil',
            'validation' => Services::validation()
        ];

        return view('editprofil', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
   
    public function editSave()
    {
        // Validation rules
        if (session()->username ==  $this->request->getPost('username')){
            $rule_username = 'required|min_length[7]|max_length[20]';
        } 
        else{
            $rule_username = 'required|min_length[7]|max_length[20]|is_unique[accounts.username]';
        }
        if (session()->email ==  $this->request->getPost('email')){
            $rule_email = 'required|valid_email';
        } 
        else{
            $rule_email = 'required|valid_email|is_unique[accounts.email]';
        }

        $rules = [
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => "Email not valid",
                    'is_unique' => "Email has been registered"
                ]
            ],
            'nama' => 'required|min_length[5]|max_length[255]',
            'username' => ['rules' => $rule_username,
            'imageFile' => [   
                'rules' => 'max_size[imageFile,1024]|is_image[imageFile]|mime_in[imageFile,image/jpg,image/jpeg,image/png]',
        ]
            
        ]
           
        ];
  
        
        if ($this->validate($rules)) {
            $fileFoto = $this->request->getFile('imageFile');
            if ($fileFoto->getError() == 4){
                $namafoto = session()->foto;
            }
            else{
                $namafoto = $fileFoto->getRandomName();
                $fileFoto->move('users', $namafoto);
            }    
          
            $data = [
                'id' => session()->id,
                'email' => $this->request->getPost('email'),
                'nama' => $this->request->getPost('nama'),
                'foto' => $namafoto,
                'username' => $this->request->getPost('username')
            ];
            
            // Submit data
            $this->userModel->save($data);
            // Redirect to Login Page
            $userData = [
                'id' => $data['id'],
                'nama' => $data['nama'],
                'username' => $data['username'],
                'foto' => $data['foto'],
                'email' => $data['email'],
                'logged_in' => TRUE
            ];
    
            session()->set($userData);
            return redirect()->to('/profil');
        } else {
            // Send error message to Register Page
            return redirect()->to(base_url('editProfil'))->withInput();
        }
    }
    
    public function editpassword(){
        if (!$this->isLoggedIn()) {
            echo '<script>alert("Silahkan Login Terlebih Dahulu");document.location.href = "/login"</script>';
        }
        $data = [
            'title' => 'Edit Password',
            'validation' => Services::validation()
        ];
        return view('editpassword', $data);
    }

    public function editpasswordsave(){
        $rules = [
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
          
        ];
        if ($this->validate($rules)) {
            $data = [
                'id' => session()->id,
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
             ];
         $this->userModel->save($data);
         return redirect()->to('/profil');
        } else {
            // Send error message to Register Page
            return redirect()->to(base_url('/editprofil/editpassword'))->withInput();
        }
    }
 
}