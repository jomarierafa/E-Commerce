<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_m extends CI_Model{

		public function login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->get('admin');
			if($result->num_rows()>0){
				$userdata = array(
					'user_id' => $result->row(0)->id,
					'username' => $username,
				 	'logged_in' => TRUE);
				$this->session->set_userdata($userdata);
				return true;
			}else{
				return false;
			}

		}

		
	}	