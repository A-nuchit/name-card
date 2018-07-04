<!DOCTYPE html>
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
<body>
	<a href="<?php echo base_url() ?>index.php/welcome/home"> home </a>
	<?php if (isset($query)): ?>
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th><center>username</center></th>
				<th><center>name</center></th>
				<th><center>last</center></th>
				<th><center>E-mail</center></th>
				<th><center>เบอร์โทรศัพท์</center></th>
				<th><center>button</center></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($query as $r):?>
				<tr align="center">
					<td><?php echo $r->username; ?></td>
					<td><?php echo $r->name; ?></td>
					<td><?php echo $r->lastname; ?></td>
					<td><?php echo $r->email; ?></td>
					<td><?php echo $r->tel; ?></td>
					<?php if($r->username != "admin"){ ?>
					<td><a href="<?php echo base_url() ?>index.php/welcome/del_users?id=<?php echo $r->user_id ?>">Del</a></td>
				<?php } ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</body>
</html>
