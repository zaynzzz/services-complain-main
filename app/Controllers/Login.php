<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;

class Login extends BaseController
{
    public function __construct()
    {
        $this->db = db_connect();
        $this->model = new Admin();;
    }
    public function index()
    {
        return view('Login/signin');
    }
    public function regist()
    {
        return view('Login/signup');
    }
    public function processregist()
    { {

            // dd($this->request->getVar());
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[20]|is_unique[mt_admin.username]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 20 Karakter',
                        'is_unique' => 'Username sudah digunakan sebelumnya'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[50]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 50 Karakter',
                    ]
                ],
                'password2' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                    ]
                ],
                'fullname' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 100 Karakter',
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $users = new Admin();
            $users->insert([
                'fullname' => $this->request->getVar('fullname'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'name' => $this->request->getVar('name')
            ]);
            return redirect()->to('/login');
        }
    }
    public function processlogin()
    {
        $users = new Admin();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->db->query("SELECT * FROM mt_admin WHERE username='$username'")->getRow();
        // dd($dataUser);
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'fullname' => $dataUser->fullname,
                    'username' => $dataUser->username,
                    'level' => $dataUser->level_user,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('Dashboard'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to('Login');
            }
        } else {
            session()->setFlashdata('error', 'Username Salah ');
            return redirect()->to('Login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('Login');
    }
}
