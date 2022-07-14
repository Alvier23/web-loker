<?php

namespace App\Controllers;

use App\Models\LowonganModel;
use App\Models\PelamarModel;
use App\Models\PendaftarModel;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'title' => 'PT Usaha Teknologi Mantap - Website Lowongan Kerja',
		];
		return view('home/index', $data);
	}

	public function login()
	{
		helper(['form']);
		return view('home/login');
	}

	public function authlog()
	{
		$session = session();
		$model = new UserModel();
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$data = $model->where('email', $email)->first();
		if ($data) {
			$pass = $data['password'];
			$verifikasi = password_verify($password, $pass);
			if ($verifikasi) {
				$array_login = [
					'id' => $data['id'],
					'nama_user' => $data['nama'],
					'email_user' => $data['email'],
					'password' => $data['password'],
					'hai' => "Hai, "
				];
				$session->set($array_login);
				return redirect()->to('/');
			} else {
				$session->setFlashdata('pesan', 'Username dan password anda salah');
				return redirect()->to('home/login');
			}
		} else {
			$session->setFlashdata('pesan', 'Username dan password anda salah');
			return redirect()->to('home/login');
		}
	}

	public function registrasi()
	{
		helper(['form']);
		$data = [];
		return view('home/register', $data);
	}
	public function authregis()
	{
		$session = session();
		helper(['form', 'url']);
		if (!$this->validate([
			'email' => [
				'rules' => 'required|is_unique[user.email]',
				'errors' => [
					'required' => '{field} harus di isi',
					'is_unique' => 'Email Sudah Digunakan sebelumnya'
				]
			],
			'password' => [
				'rules' => 'required|min_length[6]|max_length[50]',
				'errors' => [
					'required' => '{field} harus di isi',
					'min_length' => '{field} minimal 6 karakter',
					'max_length' => '{field} maximal 50 karakter'
				]
			],
			'confpassword' => [
				'rules' => 'matches[password]',
				'errors' => [
					'matches' => 'Konfirmasi Password tidak sesuai dengan password',
				]
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
		$user = new UserModel();
		$data = [
			'nama' => $this->request->getVar('nama'),
			'alamat' => $this->request->getVar('alamat'),
			'notelp' => $this->request->getVar('notelp'),
			'tempat_lahir' => $this->request->getVar('tempatlhr'),
			'tgl_lahir' => $this->request->getVar('tgllahir'),
			'pendidikan' => $this->request->getVar('pendidikan'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'agama' => $this->request->getVar('agama'),
			'email' => $this->request->getVar('email'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
		];
		$user->save($data);
		$session->setFlashdata('sukses', 'Selamat Anda berhasil registrasi, silahkan login dengan akun yang anda buat');
		return redirect()->to('home/login');
	}


	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}

	public function hrd()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'HRD - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'hrd' => $model->getLokerHRD(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/hrd', $data);
	}
	public function adminenterprise()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'Admin - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'admin' => $model->getLokerAdmin(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/adminenterprise', $data);
	}

	public function governance()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'Governance - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'governance' => $model->getLokerGovernance(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/governance', $data);
	}

	public function securityIT()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'Security - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'security' => $model->getLokerSecurity(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/security', $data);
	}

	public function webdeveloper()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'Web - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'web' => $model->getLokerWeb(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/webdev', $data);
	}

	public function mobileprogrammer()
	{
		$model = new LowonganModel();
		$model1 = new UserModel();
		$id = session()->get('id');
		$data = [
			'title' => 'Mobile Programmer - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'mobile' => $model->getLokerMobile(),
			'profiluser' => $model1->getUserDetail($id)
		];
		return view('home/mobiledev', $data);
	}

	public function applyLoker()
	{
		$session = session();
		$model = new PelamarModel();
		$data = [
			'id_user_detail' => $this->request->getVar('id_user'),
			'id_lowongan_detail' => $this->request->getVar('id_loker'),
			'status_pelamar' => $this->request->getVar('status')
		];
		$cek_user = $model->getWhere(['id_user_detail' => $data['id_user_detail']]);
		$cek_lamaran = $model->getWhere(['id_user_detail' => $data['id_user_detail'], 'id_lowongan_detail' => $data['id_lowongan_detail']]);
		if (!empty($cek_lamaran->getRow())) {
			$session->setFlashdata('gagal', 'Anda sudah mendaftar di lowongan ini');
			return redirect()->to('/');
		}
		if (!empty($cek_user->getRow())) {
			$session->setFlashdata('gagal', 'Anda sudah mendaftar lowongan lain (batas lamaran hanya 1x)');
			return redirect()->to('/');
		} else {
			$model->save($data);
			$session->setFlashdata('sukses', 'Selamat Anda berhasil mengapply, silahkan tunggu informasi selanjutnya di email anda');
			return redirect()->to('/');
		}
	}

	public function pengaturanakun()
	{
		$model = new UserModel();
		$id = session()->get('id');
		$model->getUserDetail($id);
		$data = [
			'title' => 'Pengaturan Akun - PT Usaha Teknologi Mantap',
			'iduser' => session()->get('id'),
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'profiluser' => $model->getUserDetail($id)
		];
		return view('home/pengaturan', $data);
	}

	public function updateAkun()
	{
	}

	public function dokumen()
	{
		$model = new UserModel();
		$id = session()->get('id');
		$model->getUserDetail($id);
		$data = [
			'title' => 'Pengaturan Akun - PT Usaha Teknologi Mantap',
			'nama_user' => session()->get('nama_user'),
			'hai' => session()->get('hai'),
			'profiluser' => $model->getUserDetail($id)
		];
		return view('home/dokumen', $data);
	}

	public function updateDokumen()
	{
		$model = new UserModel();
		if (!$this->validate([
			'cv' => [
				'rules' => 'max_size[cv,2048]|mime_in[cv,image/jpg,image/jpeg,image/png,application/pdf]',
				'errors' => [
					'max_size' => 'File CV yang anda upload terlalu besar',
					'mime_in' => 'Format file cv yang anda upload salah'
				]
			],
			'skck' => [
				'rules' => 'max_size[skck,2048]|mime_in[skck,image/jpg,image/jpeg,image/png,application/pdf]',
				'errors' => [
					'max_size' => 'File SKCK yang anda upload terlalu besar',
					'mime_in' => 'Format File SKCK yang anda upload salah'
				]
			],
			'lamaran' => [
				'rules' => 'max_size[lamaran,1024]|mime_in[lamaran,application/pdf]',
				'errors' => [
					'max_size' => 'File Lamaran yang anda upload terlalu besar',
					'mime_in' => 'Format file Lamaran yang anda upload salah (harus berupa pdf)'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,2048]|mime_in[foto,image/jpg,image/jpeg,image/png,application/pdf]',
				'errors' => [
					'max_size' => 'Foto yang anda upload terlalu besar',
					'mime_in' => 'Format file skck yang anda upload salah'
				]
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/home/dokumen')->withInput();
		}


		$file = [
			'cv' => $this->request->getFile('cv'),
			'skck' => $this->request->getFile('skck'),
			'lamaran' => $this->request->getFile('lamaran'),
			'foto' => $this->request->getFile('foto'),
		];

		// cek apakah file tidak berubah

		if ($file['cv']->getError() == 4) {
			$namafilecv = $this->request->getVar('cvlama');
		} elseif ($file['cv'] == 'NULL') {
			$file['cv']->move('assets/file');
			$namafilecv = $file['cv']->getName();
		} else {
			$file['cv']->move('assets/file');
			$namafilecv = $file['cv']->getName();
			unlink('assets/file/' . $this->request->getVar('cvlama'));
		}
		


		if ($file['skck']->getError() == 4) {
			$namafileskck = $this->request->getVar('skcklama');
		} else {
			$file['skck']->move('assets/file');
			$namafileskck = $file['skck']->getName();
			unlink('assets/file/' . $this->request->getVar('skcklama'));
		}

		if ($file['lamaran']->getError() == 4) {
			$namafilelamaran = $this->request->getVar('lamaranlama');
		} else {
			$file['lamaran']->move('assets/file');
			$namafilelamaran = $file['lamaran']->getName();
			unlink('assets/file/' . $this->request->getVar('lamaranlama'));
		}

		if ($file['foto']->getError() == 4) {
			$namafilefoto = $this->request->getVar('fotolama');
		} else {
			$file['foto']->move('assets/file');
			$namafilefoto = $file['foto']->getName();
			unlink('assets/file/' . $this->request->getVar('fotolama'));
		}

		$id = $this->request->getVar('id_user_detail');
		$data = [
			'id_user' => $this->request->getVar('id_user'),
			'file_cv' => $namafilecv,
			'file_skck' => $namafileskck,
			'file_lamaran' => $namafilelamaran,
			'foto' => $namafilefoto,
		];
		$model->updateUserDetail($data, $id);
		return redirect()->to('/home/dokumen')->with('berhasil', 'Data Berhasil di Ubah');
	}
}
