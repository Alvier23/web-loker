<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class PelamarModel extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    protected $allowedFields = ['id_pendaftar', 'id_user_detail', 'id_lowongan_detail', 'status_pelamar'];


    public function getPendaftar()
    {
        return $this->db->table('pendaftar')
            ->get()->getResultArray();
    }

    public function getPelamar($id = false)
    {
        if ($id == false) {
            return $this->db->table('pendaftar')
                ->join('lowongan_detail', 'lowongan_detail.id_detail=pendaftar.id_lowongan_detail')
                ->join('user_detail', 'user_detail.id_user_detail=pendaftar.id_user_detail')
                ->join('user', 'user.id=user_detail.id_user')
                ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
                ->get()->getResultArray();
        }
        return $this->db->table('pendaftar')->where(['id_pendaftar' => $id])
            ->join('lowongan_detail', 'lowongan_detail.id_detail=pendaftar.id_lowongan_detail')
            ->join('user_detail', 'user_detail.id_user_detail=pendaftar.id_user_detail')
            ->join('user', 'user.id=user_detail.id_user')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }

    public function updatePelamar($status_pelamar, $id_pendaftar)
    {
        $query = $this->db->table('pendaftar')
            ->update($status_pelamar, ['id_pendaftar' => $id_pendaftar]);
        return $query;
    }
}
