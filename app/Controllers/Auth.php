<?php

namespace App\Controllers;

use App\Models\AuthModels;

class Auth extends BaseController
{
    protected $AuthModels;
    protected $session;
    public function __construct()
    {
        $this->AuthModels = new AuthModels();
        $this->session = \Config\Services::session();
    }
    public function login()
    {
        return view('login/login');
    }
    public function loginHandler()
    {
        $email = $this->request->getVar('email');

        $password = $this->request->getVar('password');
        // dd($email, $password);
        $user = $this->AuthModels->where(['email' => $email])->first();
        if ($user == null) {
            $this->session->setFlashdata('error', 'email tidak terdaftar');
            return redirect()->to('/Auth/login');
        }

        if ($user['password'] == $password) {
            $data = [
                'email' => $user['email'],
                'nama_user' => $user['nama_user'],
                'id_user' => $user['id_user']
            ];
            $this->session->set($data);

            return redirect()->to('/');
        } else {
            $this->session->setFlashdata('error', 'password salah');
            return redirect()->to('/Auth/login');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/Auth/login');
    }

    public function daftar()
    {
        $data = [
            'title' => 'Create Akun',
            'validation' => \config\Services::validation()
        ];

        return view('login/TambahAkun', $data);
    }
    public function save()
    {
        // validasi inputan
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required|is_unique[user.nama_user]',
                'errors' => [
                    'required' => '{field} nama user harus di isi.',
                    'is_unique' => '{field} nama user sudah terdafatar.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} email harus di isi.',
                    'is_unique' => '{field} email sudah terdafatar.'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/Auth/daftar')->withInput()->with('validation', $validation);
        }
        // dd($this->request->getVar());
        $this->AuthModels->save([
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);

        session()->setFlashdata('pesan', 'Data anda berhasil ditambahkan.');

        return redirect()->to('/Auth/login');
    }
}
