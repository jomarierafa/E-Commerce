<h2>Transactions</h2>

<div class="alert alert-success" style="display:none;">
	
</div>

<table class="table table-hover" style="margin-top: 20px;">
	<thead>
		<tr>
			<th>Transaction #</th>
			<th>Name</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id = "showTransaction">
		
	</tbody>
</table>	

<div id="transaction" class="modal fade-scale">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                     		<h4 class="modal-title">Costumer Info</h4>
                          	<button type="button" class="close" data-dismiss="modal">&times;</button>    
                     </div>  
                     <div class="modal-body" id="costumer_info">  
                         
                     </div>  
                     <div class="modal-footer">  
						              <input type="hidden" name="user_id" id="user_id" />	                     	 
                          <button type="button" class="btn btn-succcess" data-dismiss="modal">OK</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

 <!--modal for add -->
<div id="transacDetail" class="modal fade-scale">  
      <div class="modal-dialog">  
           <div class="card">
      <div class="card-header">Order Summary</div>
      <div class="card-body" id="transacBody">

      </div> 
      <div class="card-footer" id="total">Total</div>
    </div>
      </div>  
 </div>
 <input type="hidden" name="url" id="url" value="<?php echo base_url()?>">
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/transaction.js"></script>