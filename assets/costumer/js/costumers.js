$(document).ready(function(){
	showProduct();

	 function showProduct(){
			$.ajax({
				type: 'ajax',
				url: $('#url').val() + 'costumer/showProduct',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = "";
					var i;
					for(i = 0; i < data.length; i++){
						html +=  `<div class="col-lg-4 col-md-6 mb-4">
						              <div class="card h-100">
						                <a href="#"><img class="card-img-top" src="`+ $('#url').val() +`assets/images/`+ data[i].image +`" alt=""></a>
						                <div class="card-body">
						                  <h4 class="card-title">
						                    <a href="#">`+ data[i].productname +`</a>
						                  </h4>
						                  <h5>`+ data[i].price +`</h5>
						                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
						                </div>
						                <div class="card-footer">
											 <a href="javascript:;" class="btn btn-danger add-to-cart" data="`+ data[i].id + `">Add To Cart</a>
						                </div>
						              </div>
						            </div>`;
					}
					$('#availableProduct').html(html);
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
	
	});	


});	