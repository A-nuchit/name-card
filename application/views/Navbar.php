<html>
<head>
<title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
  body { 
      background-image: url(<?php echo base_url() . 'assets/image/bg_home.jpg' ?>);
      color: #ffffff;
      font-family: 'Kanit', sans-serif;
  }
  nav{
    font-family: 'Kanit', sans-serif;
  }
  	 .border
  {
  	padding: 5% 5% 5% 5%;
  	background: #fff;
  	box-shadow: 2px 5px 7px #707070;
  	-webkit-border-radius: 6px 6px 30px 6px;
	  border-radius: 6px 6px 30px 6px;
  }
  titlemain{
    color: #fff;
    font-size: 30px;
  }
  h2{
  	color: #707070;
  }

  form{
    margin-bottom: 0;
  }
  .border_show
  {
    padding: 15px 15px 15px 15px;
    background: #fff;
    background: #fff;
    box-shadow: 2px 5px 7px #70707070;
    word-wrap:break-word;
  }
  .container
  {
    padding-top: 10px;
  }
  name{
    font-size: 20px;
    color: #707070;
  }
  timepost{
     font-size: 15px;
     color: #707070;
  }
  contact{
     font-size: 17px;
     color: #606060;
  }
  p{
    color: #707070;
    font-size: 70%;
  }
  type{
    font-size: 15px;
    color: #707070;
  }
  datail{
    font-size: 12px;
    color: #707070;
  }
  last{
    font-size: 10px;
    color: #fff;
  }
  </style>
</head>
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']); ?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="<?php echo base_url() ?>index.php/welcome/">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/profile">Profile</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/select_tem">Create card</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_mycard">Show my card</a>
            </li>
             <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_mylike">Show my like</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/search_form">Search</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="nav-link"href="<?php echo base_url() ?>index.php/welcome/index" >Welcome , <?php echo $username ?></a>
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/welcome/logout/" >Sign Out</a>
        </form>
        </div>
    </nav>
  </body>
  <?php
} else { ?>
  <body class="bg-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="<?php echo base_url() ?>index.php/welcome">HOME</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <a href="<?php echo base_url() ?>index.php/welcome/login_form/" >Login</a>
        <a style="padding-left: 20px" href="<?php echo base_url() ?>index.php/welcome/register_form/" >Register</a>
        <div style="padding-left: 20px">
          <button style=" width: 100px;" type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url()?>index.php/welcome/search_form'">Search</button>
        </div>
        
        </div>
    </nav>
  </body>
  <?php
}
?>
</html>