<html>
<head>
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
    font-size: 25px;
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
    font-size: 80%;
  }
  type{
    font-size: 15px;
    color: #707070;
  }
	</style>
</head>
<body class="bg-1">
  <?php foreach($query as $r):?>

		<div class="container" style="padding-top: 20px; width: 40%">
          <div class = "border_show">
              <name><?php echo $r->topic; ?></name>
              <type>(<?php if($r->type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type><br>
              <timepost><?php echo $r->detail; ?><br></timepost>
              <contact>Contact</contact>
              <timepost><br><?php echo $r->name." ".$r->lastname ?></timepost>
              
              <?php
                  if (isset($this->session->userdata['logged_in'])) {
                      ?>
                    <div class="row">
                      <div class="col">
                        <p> E-mail : <?php echo $r->email; ?></p>
                      </div>
                      <div class="col">
                        <p> Tel : <?php echo $r->tel; ?></p>
                      </div>
                    </div>
                    <?php if($this->session->userdata['logged_in']['user_id'] != $r->user_id){
                        ?>  <a href='<?php echo base_url() ?>index.php/welcome/save_card?card_id=<?php echo $r->card_id ?>'>
                        Save</a>
                        <?php
                    }
                  }
                  ?>
          </div>
      </div>
  <?php endforeach; ?>
  </center>
</body>
</html>