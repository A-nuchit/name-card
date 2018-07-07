<html>

<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
} else {
	header("location: login_form");
}
?>
<head>
<title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt:400,600,700" rel="stylesheet">
  <style type="text/css">
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
    h2
  {
  	color: #707070;
  }


  </style>
</head>

  <body class="bg-1">
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="<?php echo base_url() ?>index.php/welcome/home/">Navbar</a>
    		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        		<li class="nav-item active">
          		<a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_member">member</a>
        		</li>
        		<li class="nav-item active">
          		<a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/Show_card_admin">Show post</a>
        		</li>
        		<li class="nav-item active">
          		<a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_listcards">List card</a>
        		</li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/Addtype_form">Add work type</a>
            </li>
      	</ul>
      	<form class="form-inline my-2 my-lg-0">
      		<a class="nav-link"href="<?php echo base_url() ?>index.php/welcome/home/" >Wellcome , <?php echo $username ?></a>
        		<a class="btn btn-primary" href="<?php echo base_url() ?>index.php/welcome/logout/" >Sign Out</a>
      	</form>
    		</div>
  	</nav>
    <div id="profile">
    <?php

    ?>
    </div><br/>
  </body>
</html>