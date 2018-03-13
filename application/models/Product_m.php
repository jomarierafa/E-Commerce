<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Product_m extends CI_Model{
		
		public function showAllProduct(){
			$query = $this->db->get('product');

			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		public function insert_crud($data)  {  
           $this->db->insert('product', $data);  
      	}

      	public function fetch_single_product($product_id){
      		$this->db->where("id", $product_id);
      		$query = $this->db->get("product");
      		return $query->result();
      	}

      	public function addProductQuantity($product_id, $data){
      		$this->db->where("id", $product_id);
      		$this->db->update("product", $data);
      	}

      	public function deleteProduct($product_id){
      		$this->db->where("id", $product_id);
      		$this->db->delete("product");
      	}
	}	