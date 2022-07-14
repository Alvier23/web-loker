<?php

namespace App\Controllers;

use App\Models\AdminLogin as ModelsAdminLogin;

class Adminlogin extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('admin/loginadmin');
    }
    public function authadmin()
    {
        $session = session();
        $model = new ModelsAdminLogin();
        $user = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $user)->first();
        if ($data) {
            $pass = $data['password'];
            $verifikasi = password_verify($password, $pass);
            if ($verifikasi) {
                $array_login = [
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'nama' => $data['nama'],
                    'logged_in' => TRUE
                ];
                $session->set($array_login);
                return redirect()->to('administrator');
            } else {
                $session->setFlashdata('pesan', 'Username dan password anda salah');
                return redirect()->to('adminlogin');
            }
        } else {
            $session->setFlashdata('pesan', 'Username dan password anda salah');
            return redirect()->to('adminlogin');
        }
    }
}
