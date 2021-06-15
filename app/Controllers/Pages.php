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
		session();
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
			'judul_berita' => 'required|is_unique[berita.judul_berita]',
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

		return redirect()->to('/pages');
	}
}
