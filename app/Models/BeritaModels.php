<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModels extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $userTimestamps = true;
    protected $allowedFields = ['judul_berita', 'isi_berita'];

    public function getberita($id_berita = false)
    {
        if ($id_berita == false) {
            return $this->findAll();
        }

        return $this->where(['id_berita' => $id_berita])->first();
    }
}
