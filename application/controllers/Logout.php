<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
        $array_items = array('username' => '', 'email' => '',  'user_id' => '', 'first_name' => '', 'last_name' => '', 'user_type' => '' );
       $this -> session -> unset_userdata($array_items);
       $this->session->sess_destroy();
       return redirect('Login/index');
	}
	
}
