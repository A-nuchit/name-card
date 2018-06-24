<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$name = ($this->session->userdata['logged_in']['name']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login_form");
}
?>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $name . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $name;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<a href="<?php echo base_url() ?>index.php/welcome/logout/">Login</a>
</div>
<br/>
</body>
</html>