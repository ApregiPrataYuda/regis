<?php

 function is_logged_in()
{
 $ci =  get_instance();

   if (!$ci->session->userdata('email')) {
    redirect('Auth');
   }else {
     $role_id = $ci->session->userdata('role_id');
     $menu = $ci->uri->segment(1);

     $querymenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    // $querymenu = $ci->db->query("SELECT * FROM user_menu WHERE menu = '$menu'")->row_array();
     $menuid = $querymenu['id'];

     $useraccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menuid]);
     if ($useraccess->num_rows() < 1) {
        redirect('Auth/blocked');
     }
   }
  }

   function cek_akses($role_id, $menu_id)
  {
    $ci =  get_instance();

    $ci->db->where('role_id',$role_id);
    $ci->db->where('menu_id',$menu_id);
   $result =  $ci->db->get('user_access_menu');

   if ($result->num_rows() > 0) {
     return "checked = 'checked'";
   }

  }