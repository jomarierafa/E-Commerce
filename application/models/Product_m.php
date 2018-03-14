<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Product_m extends CI_Model{
		
	
		public function insert_crud($data)  {  
                  $this->db->insert('product', $data);  
      	}
            public function salesRecord($data) {  
                  $this->db->insert('sales', $data);
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

            public function showTransaction(){
                  $query = $this->db->get('transaction');

                  if($query->num_rows() > 0){
                        return $query->result();
                  }else{
                        return false;
                  }
            }

            public function showCostumer($transac_num){
                  $this->db->where("transac_num", $transac_num);
                  $query = $this->db->get("customer_info");
                  return $query->result();
            }

            public function transacDetail($transac_num){
                  $this->db->where('transac_num', $transac_num);
                  $query = $this->db->get('transac_detail');
                  if($query->num_rows() > 0){
                        return $query->result();
                  }else{
                        return false;
                  }
            }
         
            public function fetch_data($query, $table, $order_by){
                  $this->db->select("*");
                  $this->db->from($table);
                  if($query != ''){
                        $this->db->like('productname', $query);
                        $this->db->or_like('productcode', $query);
                  }
                  $this->db->order_by($order_by, 'DESC');
                  return $this->db->get();
            }

            public function showGraph(){
                  $sql = "SELECT * FROM sales";
                  $query = $this->db->query($sql);
            
                  if($query->num_rows() > 0){
                        return $query->result();
                  }else{
                        return false;
                  }
            }

         
      }	