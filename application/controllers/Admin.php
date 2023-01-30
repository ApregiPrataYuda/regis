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

	public function addrole()
	{


		$this->form_validation->set_rules('role', 'Name Role', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data= [
				'titles' =>'Role Add'
			];
			$this->template->load('template','Admin/Role/Roleadd',$data);
		}else {
			$post = $this->input->post(null, TRUE);
			if (isset($_POST['add'])) {
			     $this->Menumodels->addrole($post);
				 if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Simpan');
				  }
				  redirect('Admin/role');
				  }else {
					$this->session->set_flashdata('pesan', 'Data gagal Disimpan');
					redirect('Admin/role');
				}
		}
	}

	public function deleterole($id)
	{
		$this->Menumodels->deleterole($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
		  }
		  redirect('Admin/role');
	}


	public function editrole($id)
	{
		$query = $this->Menumodels->getidrole($id)->row();
		$data= [
			'titles' =>'Role Edit',
			'row' => $query
		];
		$this->template->load('template','Admin/Role/Roleedit',$data);
	}


	public function editprocess()
	{
		$post = $this->input->post(null, TRUE);
			if (isset($_POST['edit'])) {
			     $this->Menumodels->editrole($post);
				 if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data Berhasil Di update');
				  }
				  redirect('Admin/role');
				  }else {
					$this->session->set_flashdata('pesan', 'Data gagal update');
					redirect('Admin/role');
				}
	}



	//code access

	public function Access($id)
	{
		$role_id = $this->Menumodels->accessrole($id);
		$menu_id = $this->Menumodels->getallmenus();
		// $x = $menu_id[0]->id;
	

		// $x = $this->db->get('user_menu')->result_array();
		// var_dump($x); die();
		// $y = $this->db->get_where('role',['id' => $id])->row_array();


		$data= [
			'titles' => 'Access',
			'menus' => $menu_id,
			'role' => $role_id
		];
		$this->template->load('template','Admin/Access/Accessdata',$data);
	}


	public function ubahAccess()
	{
		$menu_Id = $this->input->post('menuId');
		$role_Id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_Id,
			'menu_Id' => $menu_Id
		];
		$result = $this->db->get_where('user_access_menu',$data);
		
         if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu',$data);
			$this->session->set_flashdata('pesan', 'Access Di Ubah');
		 }else {
			$this->db->delete('user_access_menu',$data);
			$this->session->set_flashdata('pesan', 'Access Di Ubah');
		 }

		
	}
}
