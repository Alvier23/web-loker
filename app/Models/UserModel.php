<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ['id', 'nama', 'alamat', 'notelp', 'tempat_lahir', 'tgl_lahir', 'pendidikan', 'jenis_kelamin', 'agama', 'email', 'password'];

    public function getUserDetail($id)
    {
        return $this->db->table('user_detail')
            ->where('id_user', $id)
            ->join('user', 'user.id=user_detail.id_user')
            ->get()->getResultArray();
    }

    public function updateUserDetail($data, $id)
    {
        $query = $this->db->table('user_detail')
            ->update($data, ['id_user_detail' => $id]);
        return $query;
    }
}
