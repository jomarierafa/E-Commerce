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

		public function validate_product($product_name){
			$this->db->where('product', $product_name);
			$query = $this->db->get('cart');
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}

		} 
	}
		