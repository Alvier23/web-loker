<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PelamarModel;

class Administrator extends BaseController
{
	public function __construct()
	{
		$this->email = \Config\Services::email();
	}

	public function index()
	{
		$data = [
			'nama' => session()->get('nama'),
			'active' => 'active'
		];
		return view('admin/dashboard', $data);
	}

	public function loker()
	{
		$model = new AdminModel();
		$data = [
			'lokersby' => $model->getLokerSBY(),
			'lokersmrg' => $model->getLokerSMRG(),
			'lokerjkt' => $model->getLokerJKT(),
			'loker' => $model->getlowongan()
		];
		return view('admin/loker', $data);
	}

	public function addloker()
	{
		$model = new AdminModel();
		if (!$this->validate([
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Gambar yang anda upload terlalu besar',
					'is_image' => 'Format gambar yang anda upload salah',
					'mime_in' => 'Format gambar yang anda upload salah'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('administrator/loker')->withInput();
		}
		$file = $this->request->getFile('gambar');
		// cek apakah tidak ada gambar yg di upload
		if ($file->getError() == 4) {
			$namafile = 'default.jpg';
		} else {
			$file->move('assets/img');
			// ambil nama file
			$namafile = $file->getName();
		}

		$data = [
			'id_lowongan' => $this->request->getVar('id_posisi'),
			'tempat' => $this->request->getVar('tempat'),
			'gambar' => $namafile,
			'deskripsi' => $this->request->getVar('editor1'),
			'status' => $this->request->getVar('status')
		];
		$model->saveLoker($data);
		return redirect()->to('administrator/loker')->with('berhasil', 'Data Berhasil Ditambah');
	}

	public function deleteloker($id)
	{
		$model = new AdminModel();
		$data = $model->find($id);
		// hapus gambar
		if ($data['gambar'] != 'default.jpg') {
			unlink('assets/img/' . $data['gambar']);
		}
		$model->delete($id);
		return redirect()->to('administrator/loker')->with('berhasil', 'Data Berhasil Di Hapus');
	}

	public function pelamar()
	{
		$model = new PelamarModel();
		$data = [
			'datapelamar' => $model->getPelamar()
		];
		return view('admin/pelamar', $data);
	}

	public function detailpelamar($id)
	{
		$model = new PelamarModel();
		$data = [
			'detailpelamar' => $model->getPelamar($id)
		];
		return view('admin/detail_pelamar', $data);
	}

	public function emailDiterima($id)
	{
		$model = new PelamarModel();
		$data = $model->getPelamar($id);
		$to = $data[0]['email'];

		$message = "<h1>Informasi Lamaran</h1><p>Selamat " . $data[0]['nama'] . " Anda lolos pada tahap selanjutnya</p><p>Silahkan datang di kantor kami Perumahan Bundaran Graha Kamal Blok A no 21, Kecamatan Kamal, Kab. Bangkalan, 61151 dengan membawa berkas yang anda upload untuk verifikasi data</p>";

		$this->sendEmail($to, 'Lamaran Kerja PT UTM', $message);
		$status_pelamar = [
			'status_pelamar' => $this->request->getVar('status_pelamar')
		];
		$id_pendaftar = $data[0]['id_pendaftar'];
		$model->updatePelamar($status_pelamar, $id_pendaftar);

		return redirect()->to('administrator/pelamar')->with('berhasil', 'Email Berhasil Dikirim');
	}

	public function emailDitolak($id)
	{
		$model = new PelamarModel();
		$data = $model->getPelamar($id);
		$to = $data[0]['email'];

		$message = "<h1>Informasi Lamaran</h1><p>Mohon maaf kepada " . $data[0]['nama'] . "Anda belum lolos pada tahap selanjutnya</p><p>Kami tunggu lamaran selanjutnya di lain waktu</p>";

		$status_pelamar = [
			'status_pelamar' => $this->request->getVar('status_pelamar')
		];
		$id_pendaftar = $data[0]['id_pendaftar'];
		$model->updatePelamar($status_pelamar, $id_pendaftar);
		$this->sendEmail($to, 'Lamaran Kerja PT UTM', $message);
		return redirect()->to('administrator/pelamar')->with('berhasil', 'Email Berhasil Dikirim');
	}

	private function sendEmail($to, $title, $message)
	{
		$this->email->setFrom('pt.usahateknologimantap@gmail.com');
		$this->email->setTo($to);

		$this->email->setSubject($title);
		$this->email->setMessage($message);
		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('adminlogin');
	}
}
