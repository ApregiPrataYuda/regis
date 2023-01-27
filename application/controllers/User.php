<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
        $data['titles'] = 'User';
		$this->template->load('template','User/Userdata',$data);
	}
}
