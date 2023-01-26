<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menumodels extends CI_model {

    public function getallmenu()
    {
       return $this->db->query('SELECT * FROM user_menu ORDER BY id ASC')->result();
    }

    public function Addmenu($post)
    {
        $params = [
              'menu' => strtoupper(htmlspecialchars($post['menu']))  
        ];
        $this->db->insert('user_menu',$params);
    }

    public function Editmenu($post)
    {
        $params = [
              'menu' => strtoupper(htmlspecialchars($post['menu']))  
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('user_menu',$params);
    }

    public function delete($id)
    {
       $this->db->where('id', $id);
       $this->db->delete('user_menu');
    }

    public function getid($id)
    {
       $query = $this->db->query("SELECT * FROM user_menu WHERE id = '$id';");
       return $query;
    }
}