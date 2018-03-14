$(document).ready(function(){
	showOrderSummary();
	 function showOrderSummary(){
			$.ajax({
				type: 'ajax',
				url: $('#url').val() + 'costumer/showOrderSummary',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = "";
					var i;
					var totalAmount = 0;
					for(i = 0; i < data.length; i++){
						html +=  `<div class="row">
            						<div class="form-group col-xs-6">
            							<h4 style="width:400px;margin-left:15px;"><span>`+ data[i].qty +` pcs*</span> ` + data[i].product + `</h4>
            						</div>
            						<div class="form-group col-xs-6">
            							<h4>$ ` + data[i].amount + `</h4>
            						</div>
            						</div>`;
						totalAmount += parseInt(data[i].amount);
					}
					$('#orderSummary').html(html);
					$('#total').html(`<div class="row">
	            						<div class="form-group col-xs-6">
	            							<h6 style="width:400px;margin-left:15px;">Total Amount</h6>
	            						</div>
	            						<div class="form-group col-xs-6">
	            							<h4>$ ` + totalAmount + `</h4>
	            						</div>
            						</div>`);
					
				},
				error: function(){
					swal("Error","Could not Load Databases", "error");
				}
		});
	}

	$(document).on('submit', '#costumer_info', function(event){  
		   event.preventDefault();        
           
                $.ajax({  
                     url: $('#url').val() + 'costumer/addTransaction',  
                     method:'POST',  
                     data:new FormData(this),  
	                 contentType:false,  
	                 processData:false,
	                 before: function(){
		                 $empty = $('form#costumer_info').find("input").filter(function() {
	                        return this.value === "";
	                    });
	                    if($empty.length) {
	                       	swal("Ordered Failed","Fill up all Form","error");
	                        return false;
	                    }
	                 },  
                     success:function(data)  
                     {   
                     	$('#costumer_info')[0].reset();
                     	swal("Ordered Successful!", "", "success"); 
                     	showOrderSummary();
                     }  
                });  
        
	});
});
