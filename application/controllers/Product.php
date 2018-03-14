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

		public function addProduct(){
			$this->load->helper('string');
			$code = random_string('alnum',5);
			$productname = $this->input->post('product');
			$image = $this->upload_image();

        	$data = array(  
            	'productname' 	=> $productname,  
            	'productcode'	=> $code, 
            	'stock' 		=> 0,
            	'price' 		=> $this->input->post("price"), 	 
            	'image'    		=> $image  
            );  

            $sales = array(
            	'productcode' 		=> $code,
            	'productname' 		=> $productname,
            	'image' 			=> $image
            );
              
            $this->m->insert_crud($data);
           	$this->m->salesRecord($sales);  
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
	    		$output['price'] = $row->price;
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

	    public function editProduct(){
	    	$productname = $this->input->post("editproduct");
	    	$price = $this->input->post("editprice");
	    	$stock = $this->input->post("editstock");
	    	
	    	$updated_data = array(
	    		'productname' 	=> $productname,
	    		'price'			=> $price,
	    		'stock'			=> $stock
	    	);

	    	//this is updating , im hust using the model function of addProduct quantity
           	$this->m->addProductQuantity($this->input->post("edit_product_id"), $updated_data);

           
	    }


	    public function transaction(){
	    	if($this->session->userdata('logged_in')){
				$this->load->view('layout/admin/header');
				$this->load->view('product/transaction');
				$this->load->view('layout/admin/footer');
			}else{
				redirect(base_url());
			}	
	    }

	    public function salesReport(){
	    	if($this->session->userdata('logged_in')){
				$this->load->view('layout/admin/header');
				$this->load->view('product/sales');
				$this->load->view('layout/admin/footer');
			}else{
				redirect(base_url());
			}	
	    }

	    public function showTransaction(){
	    	$result = $this->m->showTransaction();
			echo json_encode($result);
	    }

	    public function showCostumer(){
	    	$output = array();
	    		$data = $this->m->showCostumer($_POST["transac_num"]);	

	    		foreach ($data as $row) {
	    			$output['name'] = $row->name;
	    			$output['email'] = $row->email;
	    			$output['contact'] = $row->contact;
	    			$output['address'] = $row->address;
	    		}

	    		echo json_encode($output);
	    }

	    public function transacDetail(){
	    	$result = $this->m->transacDetail($_POST["transac_num"]);
			echo json_encode($result);			    	
	    }


	    function fetch(){
	    	$output = '';
	    	$query = '';
	    	if($this->input->post('query')){
	    		$query = $this->input->post('query');
	    	}
	    	$data = $this->m->fetch_data($query, "product", "id");

	    	  $output .= '	
			  <div class="table-responsive">
			     <table class="table table-bordered table-striped">
			      <tr>
			       <th>Code</th>
			       <th>Image</th>
			       <th>Product</th>
			       <th>Stock</th>
			       <th>Price</th>
			       <th>Action</th>
			      </tr>';
			  if($data->num_rows() > 0){
			   foreach($data->result() as $row){
			    $output .= '
			      <tr>
			       <td>'.$row->productcode.'</td>
			       <td><img src="'.base_url().'assets/images/'.$row->image.'" width="50px"></td>
			       <td>'.$row->productname.'</td>
			       <td>'.$row->stock.'</td>
			       <td>$ '.$row->price.'</td>
			       <td>
			       		<a href="javascript:;" class="btn btn-info item-add" data="'.$row->id.'"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
						<a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
						<a href="javascript:;" class="btn btn-success item-edit" data="'.$row->id.'"><i class="fa fa-edit" aria-hidden="true"></i></a>
			       </td>
			      </tr>';
			   }
			  }else{
			   $output .= '<tr>
			       <td colspan="5">No Data Found</td>
			      </tr>';
			  }
			  $output .= '</table>';
			  echo $output;

	    }

	    function fetch_sales(){
	    	$output = '';
	    	$query = '';
	    	if($this->input->post('query')){
	    		$query = $this->input->post('query');
	    	}
	    	$data = $this->m->fetch_data($query, "sales", "quantity_output");

	    	  $output .= '	
			  <div class="table-responsive">
			     <table class="table table-bordered table-striped">
			      <tr>
			       	<th>Image</th>
					<th>Code</th>
      				<th>Product</th>
					<th>QTY Sales</th>
					<th>QTY Amount</th>
			      </tr>';
			  if($data->num_rows() > 0){
			   foreach($data->result() as $row){
			    $output .= '
			      <tr>
			       <td><img src="'.base_url().'assets/images/'.$row->image.'" width="50px"></td>
			        <td>'.$row->productcode.'</td>
			       <td>'.$row->productname.'</td>
			       <td>'.$row->quantity_output.'</td>
			       <td>$ '.$row->price_output.'</td>
			      </tr>';
			   }
			  }else{
			   $output .= '<tr>
			       <td colspan="5">No Data Found</td>
			      </tr>';
			  }
			  $output .= '</table>';
			  echo $output;

	    }


	    public function showGraph(){
	    	$result = $this->m->showGraph();
			echo json_encode($result);
	    }

	}		