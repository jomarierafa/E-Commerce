<div style="margin-top: 50px;" class="container">
  <div class="row">
    <div class="col-sm-6">
    	<div class="card">
		  <div class="card-header">Order Summary</div>
		  <div class="card-body" id="orderSummary">

		  </div> 
		  <div class="card-footer" id="total">Total</div>
		</div>
    </div>
       <div class="col-sm-6">

		<div class="container">
		  <h2>Fill up this form</h2>
		  <form class="form-horizontal" id="costumer_info">
		  	 <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Name:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Email:</label>
		      <div class="col-sm-10">
		        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Contact#:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact"  onkeyup="this.value = this.value.replace(/[a-zA-Z\s.]/, '')" >
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Address:</label>
		      <div class="col-sm-10">
		        <textarea type="address" class="form-control" id="address" placeholder="Enter address" name="address"></textarea>
		      </div>
		    </div>
		    
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" class="btn btn-default">Check Out</button>
		      </div>
		    </div>
		  </form>
		</div>

    </div>
  </div>
</div>

 <input type="hidden" name="url" id="url" value="<?php echo base_url()?>">
<script type="text/javascript" src="<?php echo base_url()?>assets/costumer/js/checkout.js"></script>