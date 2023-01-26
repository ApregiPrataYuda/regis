<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Menumodels');
    }
	
	public function index()
	{
        $data = [
               'titles' => 'Management Menu',
               'row' => $this->Menumodels->getallmenu()
        ];
		$this->template->load('template','Menu/Managementmenu',$data);
	}

    public function Addmenu()
    {

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'titles' => 'Management Menu Add',
         ];
            $this->template->load('template','Menu/Managementmenuadd',$data);
        }else {
          $post = $this->input->post(null, TRUE);

          if (isset($_POST['add'])) {
           $this->Menumodels->Addmenu($post);
           if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Simpan');
          }
          redirect('Menu');
          }else {
            $this->session->set_flashdata('pesan', 'Data gagal Disimpan');
            redirect('Menu');
        }
        }
    }


    public function delete($id)
    {
       $this->Menumodels->delete($id);
       $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
       redirect('Menu');
    }

        public function edit($id)
        {
         $query = $this->Menumodels->getid($id)->row();
         
            $data = [
                'titles' => 'Management Menu edit',
                'row' => $query
         ];
            $this->template->load('template','Menu/Managementmenuedit', $data);
        }


        public function processedit()
        {
            $post = $this->input->post(null, TRUE);

            if (isset($_POST['edit'])) {
             $this->Menumodels->Editmenu($post);
             if ($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('pesan', 'Data Berhasil Di update');
            }
            redirect('Menu');
            }else {
              $this->session->set_flashdata('pesan', 'Data gagal update');
              redirect('Menu');
          }
        }



        // sub menu

        public function Submenu()
        {
            $data = [
                'titles' => 'Management Submenu'
         ];
            $this->template->load('template','Menu/Submenu/Submenudata',$data);
        }

}
