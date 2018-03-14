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

		public function showCart(){
			$result = $this->m->showCart();
			echo json_encode($result);		
		}

		public function addToCart(){	
			$data = $this->p->fetch_single_product($_POST["product_id"]);
		    foreach ($data as $row) {
		    	$price 	= $row->price;
		    	$product = $row->productname;
		   
		    	if($this->m->validate_product($product)){
					$msg['response'] = false;
				}else{
					$insert = array(  
			        	'code' 		=> $row->productcode,  
			           	'product'	=> $product, 
			           	'amount'		=> $price
		            ); 	
		            $this->m->addToCart($insert);  
		            $msg['response'] = true;
				}	    			
		    }
				
	    	echo json_encode($msg);
		}

		public function removeFromCart(){
	    	$this->m->removeFromCart($_POST["product_id"]);
		}

		public function fetch_single_product(){
	    	$output = array();
	    	$data = $this->m->fetch_single_product($_POST["product_id"]);	

	    	foreach ($data as $row) {
	    		$output['code'] = $row->code;
	    		$output['product'] = $row->product;
	    		$output['qty'] = $row->qty;
	    		$output['amount'] = $row->amount;
	    	}
	    	echo json_encode($output);
	    }	

	    public function checkCart(){
	    	$result = $this->m->showCart();
	    	if($result){
	    		$msg['success'] = true;
	    	}else{
	    		$msg['succcess'] = false;
	    	}

	    	echo json_encode($msg);

	    }

	    public function addItemQuantity(){
	    	$oldQty = $this->input->post("qty");
	    	$quantity = $this->input->post("quantity");
	    	$price = $this->input->post("price");
	    	$code = $this->input->post("code");
	    	$total = $oldQty + $quantity;
	    	$totalAmount = $price * $total;

	    	$data = $this->m->getStock($code);	

	    	foreach ($data as $row) {
	    		$stock = $row->stock;
	    	}

	    	if($stock < $total){
	    		$msg["response"] = "Only ".$stock." total stock for this product";
	    	}else{
	    		$updated_data = array(
		    		'qty'		=> $total,
		    		'amount' 	=> $totalAmount
		    		);

	           	$this->m->addItemQuantity($this->input->post("product_id"), $updated_data);

	           	$msg["response"] = "success";
	    	}	    	
	    	echo json_encode($msg);
	    }

	    public function checkout(){
	    	$this->load->view('layout/costumer/header');
			$this->load->view('costumer/checkout');
			$this->load->view('layout/costumer/footer');
	    }
	    public function showOrderSummary(){
	    	$result = $this->m->showCart();
			echo json_encode($result);		
	    }

	    public function addTransaction(){
	    	$this->load->helper('string');
			$trans = random_string('alnum',4);
			$name = $this->input->post("name");
	    	$costumerInfo = array(  
			        	'name' 			=> $name, 
			        	'transac_num' 	=> $trans,
			           	'email'			=> $this->input->post("email"), 
			           	'contact'		=> $this->input->post("contact"),
			           	'address'		=> $this->input->post("address")
		           	);
	    	$transaction = array (
	    				'transac_num'	=> $trans,
	    				'name'			=> $name,
	    			);

	    	$this->m->addTransaction($costumerInfo, $transaction);

	    	//get every single product in cart
	    	$data = $this->m->showCart();
		    foreach ($data as $row) {
		    	$product = $row->product;
		    	$amount = $row->amount;
		    	$code = $row->code;
		    	$qty = $row->qty;

		    	//get the product current stock then deduct the costumer product quantity
		    	$pData = $this->m->getStock($code);
		    	foreach ($pData as $row) {
	    			$stock = $row->stock;
	    		}

	    		$newStock = $stock - $qty;
	    		$updatedStock = array('stock'=> $newStock);
	    		$this->m->updateStock($updatedStock, $code);

		        //get the product current sales qty at yung total na napagbentahan then add the qty and amount from cart
		        $data2 = $this->m->getSalesRecord($code);
			    foreach ($data2 as $row) {
			    	$quantity_output = $row->quantity_output;
			    	$price_output = $row->price_output;
			    }

			    $new_qty_output = $quantity_output + $qty;
			    $new_price_output = $price_output + $amount;
			    $newSalesRecord = array(
			    	'quantity_output' 	=> $new_qty_output,
			    	'price_output'		=> $new_price_output
			    );
			    $this->m->updateSales($newSalesRecord, $code);


			    //save the transaction detail
		    	$transacDetail = array(  
			        	'transac_num' 	=> $trans,  
			           	'product'		=> $product,
			           	'qty'			=> $qty, 
			           	'amount'		=> $amount
		            ); 	
		        $this->m->transacDetail($transacDetail);   
		    }	

		    //clear the cart content
		    $this->db->empty_table('cart');

	    }


		 function fetch(){
	    	$output = '';
	    	$query = '';
	    	if($this->input->post('query')){
	    		$query = $this->input->post('query');
	    	}
	    	$data = $this->m->fetch_data($query);

			  if($data->num_rows() > 0){
			   foreach($data->result() as $row){
			    $output .= '<div class="col-lg-4 col-md-6 mb-4">
						              <div class="card h-100">
						                <a href="#"><img class="card-img-top" src="'.base_url().'assets/images/'.$row->image.'" alt=""></a>
						                <div class="card-body">
						                  <h4 class="card-title">
						                    <a href="#">'.$row->productname.'</a>
						                  </h4>
						                  <h5>'.$row->price.'</h5>
						                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
						                </div>
						                <div class="card-footer">
											 <a href="javascript:;" class="btn btn-danger add-to-cart" data="'.$row->id.'">Add To Cart</a>
						                </div>
						              </div>
						            </div>';
			   }
			  }else{
			   $output .= '<div style="height:460px">
			   				<h3><i>No Data Found</i></h3>
			       			</div>';
			  }
			  $output .= '</table>';
			  echo $output;

	    }



	}	