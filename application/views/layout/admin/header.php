<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<?php if($this->session->userdata('logged_in')): ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <ul class="navbar-nav   my-2 my-lg-0">
            <li class="nav-item">
              <a href="<?php echo site_url();?>users/profile" class="nav-link"><i class="fa fa-adjust"></i>Profile</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url();?>admin/logout" class="nav-link"><i class="fa fa-adjust"></i>Log out</a>
            </li>
      </ul>
    </div>
  </nav>
<?php endif; ?>


	<div class="container">		