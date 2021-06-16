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
        if (!$this->validate([
			'email' => [
				'errors' => 
				'isi_berita' => 'required'
			]
		])) {
			$validation = \config\Services::validation();
			// dd($validation);
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // dd($email, $password);
        $user = $this->AuthModels->where(['email' => $email])->first();
        if ($user['password'] == $password) {
            return redirect()->to('/');
        }
    }
}
