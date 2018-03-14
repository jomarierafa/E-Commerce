$(document).ready(function(){
	load_data();	

	function showCart(){
		$.ajax({
			type: 'ajax',
			url: $('#url').val() + 'costumer/showCart',
			async: false,
			dataType: 'json',
			success: function(data){
				var html = "";
				var i;
				for(i = 0; i < data.length; i++){
					html +=  `<tr>
								<td>`+ data[i].code +`</td>
								<td>`+ data[i].product +`</td>
								<td>`+ data[i].qty +`</td>
								<td>$ `+ data[i].amount +`</td>
								<td> 
									<a href="javascript:;" class="btn btn-info item-qty-add" data="`+ data[i].id +`">Add QTY</i></a>
									<a href="javascript:;" class="btn btn-danger remove-from-cart" data="`+ data[i].id +`">Remove</a>
								</td> 
							  </tr>`;
				}
				$('#showCart').html(html);
				},
			error: function(){
				swal("Error","Could not Load Database", "error");
			}
		});
	}

	$(document).on('click', '.add-to-cart', function(){
		var product_id = $(this).attr("data");
		$.ajax({
			type: 'ajax',
			url: $('#url').val() + 'costumer/addToCart',
			method:"POST",
			data:{product_id:product_id},
			dataType: 'json',
			success: function(data){
				if(data.response){
					swal("Added", "has been added to your Cart","success");
				}else{
					swal("Opps","Product Already in the Cart","error");
				}
					
			}				
		});
	});	

	$(document).on('click', '.view-cart', function(){
		$('#view-cart').modal('show');	
		showCart();
	});	

	$(document).on('click', '.remove-from-cart', function(){
		var product_id = $(this).attr("data");
		swal({
			title: "Are you sure?",
			text: "Remove From Cart?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: $('#url').val() + 'costumer/removeFromCart',
					method: "POST",
					data:{product_id:product_id},
					success:function(data){
						showCart();
						swal("Product Remove From Cart!", {
						    icon: "success",
						});
					}
				});
			} 
		});			
	});	



	//add quantity to the item in the cart
	$(document).on('click', '.item-qty-add', function(){
		var product_id = $(this).attr("data");
		$.ajax({
			type: 'ajax',
			url: $('#url').val() + 'costumer/fetch_single_product',
			method:"POST",
			data:{product_id: product_id},
			dataType: 'json',
			success: function(data){
				$('#addQtyModal').modal('show');
				$('#product_id').val(product_id);
				$('#qty').val(data.qty);
				$('#price').val(data.amount);
				$('#code').val(data.code);
			}				
		});
	});	


	$(document).on('submit', '#addItemQty', function(event){  
		event.preventDefault();  
        var quantity = $('#quantity').val();  
        if(quantity != ''){  
            $.ajax({  
                url: $('#url').val() + 'costumer/addItemQuantity',  
                method:'POST',  
                data:new FormData(this),  
	            contentType:false,  
	            processData:false,
	            dataType: 'json',  
               	success:function(data)  {
                    if(data.response == "success"){  
	                 	swal("Add Successful!", "Quantity Add", "success"); 
	                  	showCart();
                    }else{
                     	swal("Product is not Enough!", data.response, "info");
                    }
                    $('#addQtyModal').modal('hide');
                    $('#addItemQty')[0].reset();
                }  
            });  
        }else {  
        	swal("Add Failed!", "Put quantity", "error"); 
        }  		

	});

	$(document).on('submit', '#cart_form', function(event){
		event.preventDefault();
			$.ajax({
				url: $('#url').val() + 'costumer/checkCart',
				method: "POST",
				async:false,
				dataType: 'json',
				success:function(data){
					if(data.success){
						swal({
							title: "Check Out?",
							text: "Click Cancel if you want to costumize your order",
							icon: "info",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								window.location = "costumer/checkout"; 
							} 
						});	
					}else{
						swal("OoOps!", "Cart is Empty","info");
					}
				}
			});	
	});


	function load_data(query){
	    $.ajax({
	    	url: $('#url').val() + 'costumer/fetch',
	    	method: "POST",
	    	data: {query:query},
	    	success: function(data){
	    		$("#availableProduct").html(data);
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