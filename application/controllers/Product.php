<?php
	Class Product extends CI_Controller{		
		function __construct(){
			parent:: __construct();
			$this->load->model('product_m', 'm');
		}

		public function index(){
			if($this->session->userdata('logged_in')){
				$this->load->view('layout/admin/header');
				$this->load->view('product/index');
				$this->load->view('layout/admin/footer');
			}else{
				redirect(base_url());
			}		
		}

		public function showAllProduct(){
			$result = $this->m->showAllProduct();
			echo json_encode($result);
		
		}

		public function addProduct(){
			$this->load->helper('string');
			$code = random_string('alnum',5);
        	$data = array(  
            	'productname' 	=> $this->input->post('product'),  
            	'productcode'	=> $code, 
            	'stock' 		=> 0,
            	'price' 		=> $this->input->post("price"), 	 
            	'image'    		=> $this->upload_image()  
            );  
              
            $this->m->insert_crud($data);  
            echo 'Data Inserted';  
           
		}

		public  function upload_image(){  
	        if(isset($_FILES["productfile"])){  
	            $extension = explode('.', $_FILES['productfile']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './assets/images/' . $new_name;  
	            move_uploaded_file($_FILES['productfile']['tmp_name'], $destination);  
	            return $new_name;  
	        }  
	    }  


      	public function fetch_single_product(){
	    		$output = array();
	    		$data = $this->m->fetch_single_product($_POST["product_id"]);	

	    		foreach ($data as $row) {
	    			$output['product'] = $row->productname;
	    			$output['stock'] = $row->stock;
	    		}

	    		echo json_encode($output);
	    }

	    public function addProductQuantity(){
	    	$stock = $this->input->post("stock");
	    	$quantity = $this->input->post("quantity");
	    	$total = $stock + $quantity;
	    	$updated_data = array('stock'=> $total);

           	$this->m->addProductQuantity($this->input->post("product_id"), $updated_data);

	    }

	    public function deleteProduct(){
	    	$this->m->deleteProduct($_POST["product_id"]);
	    }

	}		