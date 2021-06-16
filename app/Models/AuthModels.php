<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModels extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $userTimestamps = true;
    protected $allowedFields = ['nama_user', 'email', 'password'];

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id_user])->first();
    }
}
