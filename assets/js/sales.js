$(document).ready(function(){
	load_data();
	function load_data(query){
	    $.ajax({
	    	url: $('#url').val() + 'product/fetch_sales',
	    	method: "POST",
	    	data: {query:query},
	    	success: function(data){
	    		$("#salesReport").html(data);
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


	google.charts.load('current',{'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);	
	function drawChart(){
		$.ajax({
			type: 'ajax',
			url: $('#url').val() + 'product/showGraph',
			async: false,
			dataType: 'json',
			success: function(data){	
				var html = "";
				var i;					
				var datas = google.visualization.arrayToDataTable([
			 		['Product', 'TotalQuantity'],['',0]		 				
			 	]);
			 	
			 	for(i = 0; i < data.length; i++){
			 		datas.addRow(["'" + data[i].productname + "'", parseInt(data[i].quantity_output	)]);
			 	}			 		
			 	var options = {
			 		title : 'Percentage of Sales Quantity',
			 		is3D:true,
			 	};
			 	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			 	chart.draw(datas, options);
	 	
			},
			error: function(){
				alert('could not load database');
			}
		});
	}
});