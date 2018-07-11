<html>
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
  .container
  {
    padding-top: 20px;
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
    padding-top: 20px;
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
  </style>
</head>
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']); ?>
  <body class="bg-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="<?php echo base_url() ?>index.php/welcome/index">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_member">Profile</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/create_card">Create card</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_mycard">Show my card</a>
            </li>
             <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/show_mylike">Show my like</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome">Search</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="nav-link"href="<?php echo base_url() ?>index.php/welcome/index" >Wellcome , <?php echo $username ?></a>
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
        <?php echo form_open_multipart('welcome/login'); ?>
        <form>
          <div class="row">
            <div class="col-4">
              <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="col-4">
              <input type="password" class="form-control" placeholder="password" name="password" required>
                  </div>
            <div class="col-4">
                  <button type="submit" class="btn btn-outline-secondary" style="width: 50%">Login</button>
                  <a style="padding-right: 30px" href="<?php echo base_url() ?>index.php/welcome/register_form" >  SignUp</a>
              </div>
              
            </div>
            
          </div>
        </form>
        </div>
    </nav>
  </body>
  <?php
}
?>
</html>