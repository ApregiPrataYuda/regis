<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('authmodels');
    }

	public function index()
	{

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_message('valid_email', '{field} Tidak Valid...');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'login';
            $this->load->view('template/auth_header',$data);
            $this->load->view('template/auth_footer');
            $this->load->view('auth/login');
        }else {
            $this->_login();
        }
	}



    private function _login()
    {
       $email = $this->input->post('email');
        $password = $this->input->post('password');

         $checkemail = $this->authmodels->checkemail($email);

        if ($checkemail->num_rows() > 0) {

            $checkemailandpass = $this->authmodels->checkemailandpass($email,$password);
            
            if ($checkemailandpass->num_rows() > 0) {

                $getdata = $checkemailandpass->row_array();

                if ($getdata['is_active'] == 1) {

                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('email', $email);
                    $id = $getdata['id'];
                    if ($getdata['role_id'] == 1) { //admin
                        $name = $getdata['name'];
                        $email = $getdata['email'];
                        $created = $getdata['date_created'];
                        $image = $getdata['image'];
                        $role_id = $getdata['role_id'];
                        $this->session->set_userdata('access', 'admin');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email', $email);
                        $this->session->set_userdata('created', $created);
                        $this->session->set_userdata('image', $image);
                        $this->session->set_userdata('role_id', $role_id);
                        redirect('Admin');

                      }elseif ($getdata['role_id'] == 2) { //user
                        $name = $getdata['name'];
                        $email = $getdata['email'];
                        $created = $getdata['date_created'];
                        $image = $getdata['image'];
                        $role_id = $getdata['role_id'];
                        $this->session->set_userdata('access', 'user');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email', $email);
                        $this->session->set_userdata('created', $created);
                        $this->session->set_userdata('image', $image);
                        $this->session->set_userdata('role_id', $role_id);
                        redirect('User');

                      }else {
                        $this->session->set_flashdata('error','Page Tidak Ditemukan');
                        redirect('Auth/index');
                      }
                    }else {
                        $this->session->set_flashdata('error','Akun Belum Aktif');
                        redirect('Auth/index');
                    }
            }else {
                $this->session->set_flashdata('error','Password/Email salah');
                redirect('Auth/index');
            }
        }else {
            $this->session->set_flashdata('error','Account Tidak Terdaftar');
          redirect('Auth/index');
        }
    }



    public function registration()
    {

        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'konfirmasi password', 'required|matches[password]', array('matches' => '{field}, tidak sesuai dengan password'));


        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_message('valid_email', '{field} Tidak Valid...');
        $this->form_validation->set_message('is_unique', '{field} sudah dipakai...');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'registration';
            $this->load->view('template/auth_header', $data);
            $this->load->view('template/auth_footer');
            $this->load->view('auth/registration');
        }else {

          $data =  [
                 'name' => htmlspecialchars($this->input->post('name', TRUE)),
                 'email' => htmlspecialchars($this->input->post('email', TRUE)),
                 'image' => 'default.png',
                 'password' => sha1($this->input->post('password', TRUE)),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
          ];

          $this->db->insert('user', $data);
          $this->session->set_flashdata('success','account berhasil di daftarkan');
          redirect('Auth/index');
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth/index');
    }

}
