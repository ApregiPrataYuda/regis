<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
      redirect('Auth/index');
		};
	}

	public function index()
	{
		$data['titles'] = 'Dashboard';
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
		$this->load->view('admin/admin_page',$data);
        $this->load->view('template/footer');
		
	}
}
