<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function about() {
		$data = [
			'first' => 'Joel',
			'last' => 'Jacobs',
			'people' => [
				'Oliver',
				'Carla'
			]
		];
		return view('pages.about', $data);
	}

	public function contact() {
		return view('pages.contact');
	}
}
