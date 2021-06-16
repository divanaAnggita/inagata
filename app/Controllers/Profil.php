<?php

namespace App\Controllers;

use App\Models\AuthModels;

class Profil extends BaseController
{
    protected $AuthModels;
    public function __construct()
    {
        $this->AuthModels = new AuthModels();
    }
    public function index(){
        
    }
}
