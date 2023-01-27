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

    //subs menu models
    public function getdatasubs()
    {
       return $this->db->query("SELECT B.menu, A.id, A.title, A.url, A.icon, A.is_active 
       FROM user_sub_menu AS A 
       LEFT JOIN user_menu AS B 
       ON A.menu_id = B.id
       ORDER BY A.id ASC")->result();
    }


    public function getdatamenu()
    {
        return $this->db->query("SELECT * FROM user_menu ORDER BY id ASC")->result();
    }

    public function addmodels($post)
    {
        $params = [
            'menu_id' => $post['id'],
            'title' => ucwords(htmlspecialchars($post['title'])),
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']
        ];
        $this->db->insert('user_sub_menu', $params);
    }


    public function deletesubmenu($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('user_sub_menu');
    }

    public function getidsubmenu($id)
    {
       $query = $this->db->query("SELECT * FROM user_sub_menu WHERE id = '$id';");
       return $query;
    }

    public function Editmenusub($post)
    {
        $params = [
            // 'menu_id' => $post['id'],
            'title' => ucwords(htmlspecialchars($post['title'])),
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']
        ];

      $this->db->where('id', $post['id']);
      $this->db->update('user_sub_menu',$params);
    }


    // models for role
    public function getdatarole()
    {
        $query = $this->db->query("SELECT * FROM role ORDER BY id ASC")->result();
        return $query;
    }
}