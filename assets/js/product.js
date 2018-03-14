$(document).ready(function(){
	load_data();
	//add product
	$(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  
           var product = $('#product').val();  
           var price = $('#price').val();  
           var extension = $('#product_image').val().split('.').pop().toLowerCase();  
           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','']) == -1)  
           {  
                alert('Invalid Image File');  
                $('#product_image').val('');  
                return false;  
           }  
           if(product != '' && price != '')  
           {  
                $.ajax({  
                     url: $('#url').val() + 'product/addProduct',  
                     method:'POST',  
                     data:new FormData(this),  
	                 contentType:false,  
	                 processData:false,  
                     success:function(data){
                     	  load_data(); 
                          $('#user_form')[0].reset();  
                          $('#myModal').modal('hide'); 
                          swal("Item Added!", product + " is added in the inventory", "success"); 	                	
                     }  
                });  
           }  
           else  
           {  
                swal("Add Failed!", "Both Fields are Required", "error"); 
           }  
    });


		//add product
	$(document).on('click', '.item-delete', function(){
			var product_id = $(this).attr("data");
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this data!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: $('#url').val() + 'product/deleteProduct',
						method: "POST",
						data:{product_id:product_id},
						success:function(data){
							load_data();
							swal("Data has been deleted!", {
							    icon: "success",
							});
						}
					});
				} 
			});			
	});	

	//add quantity to the item
	$(document).on('click', '.item-add', function(){
		var product_id = $(this).attr("data");
		$.ajax({
				type: 'ajax',
				url: $('#url').val() + 'product/fetch_single_product',
				method:"POST",
				data:{product_id: product_id},
				dataType: 'json',
				success: function(data){
					$('#addItemModal').modal('show');
					$('.modal-title').text("Add " + data.product);
					$('#product_id').val(product_id);
					$('#stock').val(data.stock);
				}				
		});
	});	


	$(document).on('submit', '#quantity_form', function(event){  
		   event.preventDefault();  
           var quantity = $('#quantity').val();  
           
           if(quantity != ''){  
                $.ajax({  
                     url: $('#url').val() + 'product/addProductQuantity',  
                     method:'POST',  
                     data:new FormData(this),  
	                 contentType:false,  
	                 processData:false,  
                     success:function(data)  
                     {   
                          $('#quantity_form')[0].reset();  
                          $('#addItemModal').modal('hide'); 
                          swal("Item Added!", "Additional " + quantity + "has been added", "success"); 	  
                          load_data();              	
                     }  
                });  
           }  
           else  
           {  
                swal("Add Failed!", "Both Fields are Required", "error"); 
           }  		

	});

	

	function load_data(query){
	    	$.ajax({
	    		url: $('#url').val() + 'product/fetch',
	    		method: "POST",
	    		data: {query:query},
	    		success: function(data){
	    			$("#result").html(data);
	    		}
	    	})
	}

	$('#search').keyup(function(){
		var search = $(this).val();
		if(search != ''){
			load_data(search);
		}else{
			load_data();
		}
	});

});	