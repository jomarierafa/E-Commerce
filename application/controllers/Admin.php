<?php
	Class Admin extends CI_Controller{		
		function __construct()
		{
			parent:: __construct();
			$this->load->model('admin_m', 'm');
		}

		public function index(){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('layout/admin/header');
				$this->load->view('admin/login');
				$this->load->view('layout/admin/footer');
			}else{
				redirect('product');
			}
		}	

		public function login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$userdata = $this->m->login($username, $password);
			if($userdata){
				echo "success";

			}else{
				return false;
			}
		}


		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			redirect(base_url());
		}

	

	}			