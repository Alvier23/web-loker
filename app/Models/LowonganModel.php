<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
    protected $table = 'lowongan_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_detail', 'id_lowongan', 'tempat', 'gambar', 'deskripsi', 'status'];

    public function getlowongan()
    {
        return $this->db->table('lowongan')
            ->get()->getResultArray();
    }

    public function getLokerHRD()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'HRD')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerAdmin()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'Admin Enterprise')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerGovernance()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'Staff IT Governance')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerSecurity()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'Security IT')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerWeb()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'Web Developer')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
    public function getLokerMobile()
    {
        return $this->db->table('lowongan_detail')
            ->where('nama_posisi', 'Mobile Programmer')
            ->join('lowongan', 'lowongan.id=lowongan_detail.id_lowongan')
            ->get()->getResultArray();
    }
}
