<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'lowongan_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_detail', 'id_lowongan', 'tempat', 'gambar', 'deskripsi', 'status'];

    public function getlowongan()
    {
        return $this->db->table('lowongan')
            ->get()->getResultArray();
    }

    public function getLokerSBY()
    {
        return $this->db->table('lowongan_detail')
            ->where('tempat', 'Surabaya')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerSMRG()
    {
        return $this->db->table('lowongan_detail')
            ->where('tempat', 'Semarang')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerJKT()
    {
        return $this->db->table('lowongan_detail')
            ->where('tempat', 'Jakarta')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }

    public function saveLoker($data)
    {
        $query = $this->db->table('lowongan_detail')->insert($data);
        return $query;
    }
}
