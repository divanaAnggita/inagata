<?php

namespace App\Controllers;

use App\Models\Beritamodels;

class Pages extends BaseController
{
	protected $BeritaModels;
	public function __construct()
	{
		$this->BeritaModels = new BeritaModels();
	}

	public function index()
	{

		$data = [
			'title' => 'Home | Tes magang pt inagata',
			'berita' => $this->BeritaModels->getberita()
		];


		return view('pages/Home', $data);
		// echo view('pages/TambahBerita', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About | Tes magang pt inagata'
		];
		return view('pages/About', $data);
	}

	public function detail($id_berita)
	{
		// dd($berita);
		$data = [
			'title' => 'Detail Berita',
			'berita' => $this->BeritaModels->getberita($id_berita)
		];


		return view('pages/detail', $data);
	}

	public function create()
	{
		// session();
		$data = [
			'title' => 'Create Berita',
			'validation' => \config\Services::validation()
		];

		return view('pages/create', $data);
	}

	public function save()
	{
		// validasi inputan
		if (!$this->validate([
			'judul_berita' => [
				'rules' => 'required|is_unique[berita.judul_berita]',
				'errors' => [
					'required' => '{field} judul berita harus di isi.',
					'is_unique' => '{field} judul berita sudah terdafatar.'
				]
			],
			'isi_berita' => 'required'
		])) {
			$validation = \config\Services::validation();
			// dd($validation);
			return redirect()->to('/pages/create')->withInput()->with('validation', $validation);
		}
		// dd($this->request->getVar());
		$this->BeritaModels->save([
			'judul_berita' => $this->request->getVar('judul_berita'),
			'isi_berita' => $this->request->getVar('isi_berita')
		]);

		session()->setFlashdata('pesan', 'Data anda berhasil ditambahkan.');
		return redirect()->to('/pages');
	}

	public function delete($id_berita)
	{
		$this->BeritaModels->delete($id_berita);

		session()->setFlashdata('pesan', 'Data anda berhasil dihapus.');
		return redirect()->to('/pages');
	}

	public function edit($id_berita)
	{
		$data = [
			'title' => 'Edit Berita',
			'validation' => \config\Services::validation(),
			'berita' => $this->BeritaModels->getberita($id_berita)
		];

		return view('pages/edit', $data);
	}

	public function update($id_berita)
	{
		//cek data berita lana
		$beritaLama = $this->BeritaModels->getberita($id_berita);
		// dd($beritaLama);
		if ($beritaLama['judul_berita'] == $this->request->getVar('judul_berita')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[berita.judul_berita]';
		}

		// validasi update
		if (!$this->validate([
			'judul_berita' => [
				'rules' => $rule_judul,
				'errors' => [
					'required' => '{field} judul berita harus di isi.',
					'is_unique' => '{field} judul berita sudah terdafatar.'
				],
				'isi_berita' => 'required'
			]
		])) {
			$validation = \config\Services::validation();
			// dd($validation);
			return redirect()->to('/pages/edit/' . $id_berita)->withInput()->with('validation', $validation);
		}
		// dd($this->request->getVar());
		$this->BeritaModels->save([
			'id_berita' => $id_berita,
			'judul_berita' => $this->request->getVar('judul_berita'),
			'isi_berita' => $this->request->getVar('isi_berita')
		]);

		session()->setFlashdata('pesan', 'Data anda berhasil ditambahkan.');
		return redirect()->to('/pages');
	}
}
