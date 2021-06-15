<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | Tes magang pt inagata'
		];
		return view('pages/Home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About | Tes magang pt inagata'
		];
		return view('pages/About', $data);
	}
}
