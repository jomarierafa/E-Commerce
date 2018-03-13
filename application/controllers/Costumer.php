<?php
	Class Costumer extends CI_Controller{		
		function __construct(){
			parent:: __construct();
			$this->load->model('costumer_m', 'm');
			$this->load->model('product_m', 'p');
		}

		public function index(){
				$this->load->view('layout/costumer/header');
				$this->load->view('costumer/index');
				$this->load->view('layout/costumer/footer');
		}

		public function showProduct(){
			$result = $this->m->showProduct();
			echo json_encode($result);		
		}

		public function addToCart(){	
					$data = $this->p->fetch_single_product($_POST["product_id"]);
		    		foreach ($data as $row) {
		    			$price = $row->price;
		    			$product = $row->productname;
		    			if($this->m->validate_product($product)){
							$msg['response'] = false;
						}else{
							$insert = array(  
			            		'code' 		=> $row->productcode,  
			            		'product'	=> $product 
		            		); 	
		            		$this->m->addToCart($insert);  
		            		$msg['response'] = true;
						}	    			
		    		}
				
	    		echo json_encode($msg);
		}

		


	}	