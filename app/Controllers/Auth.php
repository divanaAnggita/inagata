<?php

namespace App\Controllers;

use App\Models\AuthModels;

class Auth extends BaseController
{
    protected $AuthModels;
    public function __construct()
    {
        $this->AuthModels = new AuthModels();
    }
    public function login()
    {
        return view('login/login');
    }
    public function loginHandler()
    {
        $session = session();
        $email = $this->request->getVar('email');

        $password = $this->request->getVar('password');
        // dd($email, $password);
        $user = $this->AuthModels->where(['email' => $email])->first();
        if ($user == null) {
            $session->setFlashdata('error', 'email tidak terdaftar');
            return redirect()->to('/Auth/login');
        }

        if ($user['password'] == $password) {
            $data = [
                'email' => $user['email'],
                'nama_user' => $user['nama_user'],
                'id_user' => $user['id_user']
            ];
            $session->set($data);

            return redirect()->to('/');
        } else {
            $session->setFlashdata('error', 'password salah');
            return redirect()->to('/Auth/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Auth/login');
    }
    
}
