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
  	width: 40%;
    padding: 5% 5% 5% 5%;
    background: #fff;
    padding: 5% 5% 5% 5%;
    background: #fff;
    box-shadow: 2px 5px 7px #70707070;
    word-wrap:break-word;
  }
	</style>
</head><body>
			<?php foreach($query as $r):?>
					<div style="padding-top: 20px;">
                <div class = "border_show">
                    <name><?php echo $r->title; ?></name><br>
                    <timepost><?php echo $r->name; ?>   <?php echo $r->time; ?></timepost>
                    <p><?php echo $r->content; ?></p>
                </div>
            </div>
		<?php endforeach; ?>
</body>
</html>