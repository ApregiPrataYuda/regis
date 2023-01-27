<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menumodels');
	}
	
	public function index()
	{
        $data['titles'] = 'Dashboard Admin';
		$this->template->load('template','Admin/Admindata',$data);
	}


	//code role
	public function role()
	{
		$data= [
			'titles' =>'Role Admin',
			'row' => $this->Menumodels->getdatarole()
		];
         
		$this->template->load('template','Admin/Role/Roledata',$data);
	}

	public function addrole(Type $var = null)
	{
		$data= [
			'titles' =>'Role Admin',
		];
         
		$this->template->load('template','Admin/Role/Roleadd',$data);
	}
}
