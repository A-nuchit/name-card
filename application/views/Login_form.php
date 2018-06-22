<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt:400,600,700" rel="stylesheet">
  <style>
  .bg-1 { 
      background-color: #1abc9c;
      color: #ffffff;
      font-family: 'Prompt', sans-serif;
  }
  .border
  {
  	padding: 5% 5% 5% 5%;
  	background: #fff;
  	box-shadow: 2px 5px 7px #70707070;
  	-webkit-border-radius: 6px 6px 30px 6px;
	border-radius: 6px 6px 30px 6px;
  }
  .container
  {
  	padding-top: 10%; 
  }
  h2
  {
  	color: #707070;
  }
  </style>
</head>
<body class="bg-1">
	<div class="container" style="width: 40% ">
		<div class="border">
	  	<h2><center>Login</center></h2>
	  	<?php echo form_open_multipart('welcome/login'); ?>
	  	<form>
	  		<div class="row">
	  			<div class="col">
		    		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="ชื่อ" name="name" required>
		    		</div>
		    	</div>
	    	</div>
	    	<div class="row">
	    		<div class="col">
			    	<div class="form-group">
			      		<input type="password" class="form-control" placeholder="password" name="password" required>
			    	</div>
		    	</div>
		    </div>
	    	<center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
	    	<a href="<?php echo base_url() ?>index.php/welcome/register"> SignUp</a>
	    	</center>
	  	</form>
	  </div>
	</div>
</body>
</html>