<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Costumer_m extends CI_Model{
		public function showProduct(){
			$this->db->where('stock !=', 0);
			$query = $this->db->get('product');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}

		public function addToCart($data){
			 $this->db->insert('cart', $data);  
		}

		public function showCart(){
			$query = $this->db->get('cart');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		public function validate_product($product_name){
			$this->db->where('product', $product_name);
			$query = $this->db->get('cart');
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		} 

		public function removeFromCart($product_id){
      		$this->db->where("id", $product_id);
      		$this->db->delete("cart");
      	}

      	//add quantity
      	public function fetch_single_product($product_id){
      		$this->db->where("id", $product_id);
      		$query = $this->db->get("cart");
      		return $query->result();
      	}
      	public function getStock($code){
      		$this->db->where("productcode", $code);
      		$query = $this->db->get("product");
      		return $query->result();	
      	}

      	public function addItemQuantity($product_id, $data){
      		$this->db->where("id", $product_id);
      		$this->db->update("cart", $data);
      	}

      	public function addTransaction($costumerInfo, $transaction){
			 $this->db->insert('customer_info', $costumerInfo);  
			 $this->db->insert('transaction', $transaction);
		}
		public function updateStock($data, $code){
			$this->db->where("productcode", $code);
			$this->db->update("product", $data);
		}

		public function cart(){
			$query = $this->db->get("cart");
      		return $query->result();
		}
		public function transacDetail($data){
			$this->db->insert('transac_detail', $data);  
		}

		//search available product where stock != 0
		public function fetch_data($query){
            $this->db->select("*");
            $this->db->where('stock !=', 0);
            $this->db->from("product");
            if($query != ''){
                $this->db->like('productname', $query);
                $this->db->or_like('productcode', $query);
           	}
                $this->db->order_by('id', 'DESC');
                return $this->db->get();
        }
        
        public function getSalesRecord($code){
        	$this->db->where("productcode", $code);
      		$query = $this->db->get("sales");
      		return $query->result();
        }
        public function updateSales($data, $code){
        	$this->db->where("productcode", $code);
			$this->db->update("sales", $data);
        }    
	}
		