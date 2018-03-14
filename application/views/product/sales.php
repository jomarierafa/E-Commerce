<h2>Total Sales Report</h2>



<div style="margin-top: 50px;" class="container">
  <input type="text" name="search" id="search" placeholder="search" />
  <div class="row">
    <div class="col-sm-6">
  		<div id="salesReport" style="margin-top: 10px">
  			<h1> No Current Data </h1>
		</div>
  	</div>
  	<div class="col-sm-6">
  		<div id="piechart" style="width: 500px;height: 300px"></div>
  	</div>
  </div>
</div>  	
 

<input type="hidden" name="url" id="url" value="<?php echo base_url()?>">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/sales.js"></script>