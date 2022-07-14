<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    protected $allowedFields = ['id_pendaftar', 'id_user_detail', 'id_lowongan_detail', 'status_pelamar'];

    public function saveData($data)
    {
        $query = $this->db->table('pendaftar')->insert($data);
        return $query;
    }
}
