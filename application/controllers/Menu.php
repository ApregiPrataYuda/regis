<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct(){
        parent::__construct();
        is_logged_in();
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
                'titles' => 'Management Submenu',
                'rows' => $this->Menumodels->getdatasubs()
         ];
            $this->template->load('template','Menu/Submenu/Submenudata',$data);
        }

        public function Addsubmenu()
        {

            $this->form_validation->set_rules('id', 'Menu', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('icon', 'icon', 'required');
            $this->form_validation->set_rules('is_active', 'status', 'required');
            $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'titles' => 'Management Submenu Add',
                    'row' =>  $this->Menumodels->getdatamenu()
             ];
                $this->template->load('template','Menu/Submenu/Submenuadd',$data);
            }else {
               $post = $this->input->post(null, TRUE);
               if (isset($_POST['add'])) {
                   $this->Menumodels->addmodels($post);
                   if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Simpan');
                  }
                  redirect('Menu/SubMenu');
               }else {
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('error', 'Data gagal Di Simpan');
                  }
                  redirect('Menu/SubMenu');
               }
            }
        }


        public function Deletesubmenu($id)
        {
             $this->Menumodels->deletesubmenu($id);
             if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
              }
              redirect('Menu/SubMenu');
        }


        public function Editsubmenu($id)
        {
            $query = $this->Menumodels->getidsubmenu($id)->row();
            $data = [
                'titles' => 'Management Submenu edit',
                'row' => $query,
                // 'rows' =>  $this->Menumodels->getdatamenu()
         ];
            $this->template->load('template','Menu/Submenu/Submenuedit',$data);
        }


        public function processeditsub()
        {
             $post = $this->input->post(null, TRUE);

             if (isset($_POST['edit'])) {
                $this->Menumodels->Editmenusub($post);
                if ($this->db->affected_rows() > 0) {
                 $this->session->set_flashdata('pesan', 'Data Berhasil Di update');
               }
               redirect('Menu/SubMenu');
               }else {
                 $this->session->set_flashdata('pesan', 'Data gagal update');
                 redirect('Menu/SubMenu');
             }
             
        }

}
