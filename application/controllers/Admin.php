<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
        $data['titles'] = 'Dashboard Admin';
		$this->template->load('template','Admin/Admindata',$data);
	}
}
