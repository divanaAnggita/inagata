<?php

namespace App\Controllers;

use App\Models\AuthModels;

class Profil extends BaseController
{
    protected $AuthModels;
    protected $session;
    public function __construct()
    {
        $this->AuthModels = new AuthModels();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $id_user = $this->session->get('id_user');
        $data = [
            'title' => 'Profil | Tes magang pt inagata',
            'user' => $this->AuthModels->getUser($id_user)
        ];

        // dd($id_user);
        return view('/profil/profil', $data);
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Edit User',
            'validation' => \config\Services::validation(),
            'user' => $this->AuthModels->getUser($id_user)
        ];

        return view('/profil/edit', $data);
    }

    public function update()
    {
        $id_user = $this->session->get('id_user');
        //cek data  lana
        $datalama = $this->AuthModels->getUser($id_user);
        // dd($datalama);
        if ($datalama['nama_user'] == $this->request->getVar('nama_user')) {
            $ruleNama = 'required';
        } else {
            $ruleNama = 'required|is_unique[user.nama_user]';
        }

        if ($datalama['email'] == $this->request->getVar('email')) {
            $ruleemail = 'required';
        } else {
            $ruleemail = 'required|is_unique[user.email]';
        }

        // validasi update
        if (!$this->validate([
            'nama_user' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => '{field} nama user harus di isi.',
                    'is_unique' => '{field} nama user sudah terdafatar.'
                ]
            ],
            'email' => [
                'rules' => $ruleemail,
                'errors' => [
                    'required' => '{field} nama user harus di isi.',
                    'is_unique' => '{field} nama user sudah terdafatar.'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/profil/edit/' . $id_user)->withInput()->with('validation', $validation);
        }
        // dd($this->request->getVar());
        $this->AuthModels->save([
            'id_user' => $id_user,
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);

        session()->setFlashdata('pesan', 'Data anda berhasil ditambahkan.');
        return redirect()->to('/profil');
    }
}
