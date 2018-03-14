$(document).ready(function(){
	showTransaction();

	function showTransaction(){
		$.ajax({
			type: 'ajax',
			url: $('#url').val() + 'product/showTransaction',
			async: false,
			dataType: 'json',
			success: function(data){
				var html = "";
				var i;
				for(i = 0; i < data.length; i++){
					html += '<tr>' +
								'<td>'+data[i].transac_num+'</td>' +
								'<td>'+data[i].name+'</td>' +
								'<td>'+data[i].ordered_at+'</td>' +
								'<td>' +
									'<a href="javascript:;" style="margin-right:5px;" class="btn btn-info view-costumer" data="'+data[i].transac_num+'">Costumer Info</a>'+
									'<a href="javascript:;" class="btn btn-danger transac-detail" data="'+data[i].transac_num+'">Transac Detail</a>'+
								'</td>' +
							'</tr>';
				}
				$('#showTransaction').html(html);
			},
			error: function(){
				swal("Error","Could not Load Database", "error");
			}
		});
	}

	$(document).on('click', '.view-costumer', function(){
		$('#transaction').modal("show");
		var transac_num = $(this).attr("data");
		$.ajax({
				type: 'ajax',
				url: $('#url').val() + 'product/showCostumer',
				method:"POST",
				data:{transac_num: transac_num},
				dataType: 'json',
				success: function(data){
					$('#costumer_info').html(
						`<h4>Name:<b> ` + data.name + `</b></h4>
						<h4>Email:<b> ` + data.email + `</b></h4>
						<h4>Contact:<b> ` + data.contact + `</b></h4>
						<h4>address:<b> ` + data.address + `</h4>`
						);
				}				
		});
	});	

	$(document).on('click', '.transac-detail', function(){
		$('#transacDetail').modal("show");
		var transac_num = $(this).attr("data");
		$.ajax({
				type: 'ajax',
				url: $('#url').val() + 'product/transacDetail',
				method:"POST",
				data:{transac_num: transac_num},
				dataType: 'json',
				success: function(data){
					var html = "";
					var i;
					var totalAmount = 0;
					for(i = 0; i < data.length; i++){
						html +=  `<div class="row">
            						<div class="form-group col-xs-6">
            							<h4 style="width:400px;margin-left:15px;">`+ data[i].qty + `pcs* `+ data[i].product + `</h4>
            						</div>
            						<div class="form-group col-xs-6">
            							<h4>$ ` + data[i].amount + `</h4>
            						</div>
            						</div>`;
						totalAmount += parseInt(data[i].amount);
					}
					$('#transacBody').html(html);
					$('#total').html(`<div class="row">
	            						<div class="form-group col-xs-6">
	            							<h6 style="width:400px;margin-left:15px;">Total Amount</h6>
	            						</div>
	            						<div class="form-group col-xs-6">
	            							<h4>$ ` + totalAmount + `</h4>
	            						</div>
            						</div>`);
					
				}
		});
	});
});	