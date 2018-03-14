<h2>Products List</h2>
<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-lg">Add</button>
<div class="alert alert-success" style="display:none;">
	
</div>
<input type="text" name="search" id="search" placeholder="search">

<div id="result" style="margin-top: 10px;">
  <h1> No Current Data </h1>  
</div>

		
	
<!--modal for add -->
<div id="myModal" class="modal fade-scale">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                     		<h4 class="modal-title">Add Product</h4>
                          	<button type="button" class="close" data-dismiss="modal">&times;</button>    
                     </div>  
                     <div class="modal-body">  
                          <label>Product</label>  
                          <input type="text" name="product" id="product" class="form-control" />  
                          <br>  
                          <label>Price</label>  
                          <input type="text" name="price" id="price" class="form-control" />  
                          <br>  
                          <br>  
                          <label>Product Image</label><br>  
                          <input type="file" name="productfile" id="product_image" />  
                          <span id="product_upload_image"></span>
                     </div>  
                     <div class="modal-footer">  
						              <input type="hidden" name="user_id" id="user_id" />	                     	
                          <input type="submit" name="submit" id="submit" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

<div id="addItemModal" class="modal fade-scale">  
      <div class="modal-dialog">  
           <form method="post" id="quantity_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                        <h4 class="modal-title">Add Item</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>    
                     </div>  
                     <div class="modal-body">  
                          <label>Quantity</label>  
                          <input type="text" name="quantity" id="quantity" class="form-control" onkeyup="this.value = this.value.replace(/[^0-9\s.]/, '')"/>  
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="stock" id="stock" />  
                          <input type="hidden" name="product_id" id="product_id" />                       
                          <input type="submit" name="submit" id="submit" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

 <div id="editModal" class="modal fade-scale">  
      <div class="modal-dialog">  
           <form method="post" id="edit_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                        <h4 class="modal-title">Edit Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>    
                     </div>  
                     <div class="modal-body">  
                          <label>Product Name</label>  
                          <input type="text" name="editproduct" id="editproduct" class="form-control" />  
                          <br>
                           <label>Stock</label>  
                          <input type="text" name="editstock" id="editstock" class="form-control" />  
                          <br>    
                          <label>Price</label>  
                          <input type="text" name="editprice" id="editprice" class="form-control" />  
                          <br>  
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="edit_product_id" id="edit_product_id" />                       
                          <input type="submit" name="submit" id="submit" class="btn btn-success" value="Save" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div> 

    

 <input type="hidden" name="url" id="url" value="<?php echo base_url()?>">

 <script type="text/javascript" src="<?php echo base_url()?>assets/js/product.js"></script>