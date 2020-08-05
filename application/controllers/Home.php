<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data['main'] = 'home_view';
		$this -> load -> view('layouts/main_view', $data);
	}
}
