<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authmodels extends CI_model {

	public function checkemail($email)
	{
		$query = $this->db->query("SELECT * FROM user WHERE email = '$email' LIMIT 1");
        return $query;
	}


    public function checkemailandpass($email,$password)
	{
		$query = $this->db->query("SELECT * FROM user WHERE email = '$email' AND password = sha1('$password') LIMIT 1");
        return $query;
	}
}
