<head>
<title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

<style type="text/css">
  .bg-1 { 
    background-image: url(<?php echo base_url() . 'assets/image/bg_home.jpg' ?>);
      color: #ffffff;
      font-family: 'Kanit', sans-serif;
  }
  .border
  {
  	padding: 5% 5% 5% 5%;
  	background: #fff;
  	box-shadow: 2px 5px 7px #70707070;
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
  .fallbackLabel{
  	font-size: 15px;
  }

  </style>
</head>
<body class="bg-1">
	<div class="container" style="width: 40%; color: #707070;">
		<div class="border">
	  	<h2><center>Register</center></h2>
	  	<?php echo form_open_multipart('welcome/add_user'); ?>
	  	<form>
	  		<div class="row">
	    		<div class="col">
			    	<div class="form-group">
			      			<input type="text" class="form-control" placeholder="Username" name="username" required>
			    	</div>
		    	</div>
		    </div>
	  		<div class="row">
	  			<div class="col">
		    		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="name" name="name" required>
		      			<small id="emailHelp" class="form-text text-danger"></small>
		    		</div>
		    	</div>
		    	<div class="col">
		    		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="lastname" name="lastname" required>
		    		</div>
	    		</div>
	    	</div>
	    	<div style="padding-bottom: 7px;">
		    	<div class="form-check form-check-inline">
	  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
	  				<label class="form-check-label" for="inlineRadio1">Male</label>
				</div>
				<div class="form-check form-check-inline">
	  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
	  				<label class="form-check-label" for="inlineRadio2">Female</label>
				</div>
			</div>
			<div class="nativeDatePicker">
				<label for="bday">Enter your birthday:</label>
				<input type="date" id="bday" name="bday">
				<span class="validity"></span>
			</div>
			<p class="fallbackLabel">Enter your birthday:</p>
			<div class="fallbackDatePicker">
			  <span>
			    <label for="day">Day:</label>
			    <select id="day" name="day">
			    </select>
			  </span>
			  <span>
			    <label for="month">Month:</label>
			    <select id="month" name="month">
			      <option value="1" selected>January</option>
			      <option value="2">February</option>
			      <option value="3">March</option>
			      <option value="4">April</option>
			      <option value="5">May</option>
			      <option value="6">June</option>
			      <option value="7">July</option>
			      <option value="8">August</option>
			      <option value="9">September</option>
			      <option value="10">October</option>
			      <option value="11">November</option>
			      <option value="12">December</option>
			    </select>
			  </span>
			  <span>
			    <label for="year">Year:</label>
			    <select id="year" name="year">
			    </select>
			  </span>
			</div>
		    <label >Address</label>
		    <div class="row">
	    		<div class="col">
			    	<div class="form-group">
			      			<input type="email" class="form-control" placeholder="E-mail" name="email" required>
			    	</div>
		    	</div>
	    		<div class="col">
			    	<div class="form-group">
			      			<input type="text" class="form-control" placeholder="Tel" name="tel" required>
			    	</div>
		    	</div>
		    </div>
		    <div class="row">
	    		<div class="col">
			    	<div class="form-group">
			      			<input type="password" class="form-control" placeholder="password" name="password" required>
			      			<small id="emailHelp" class="form-text text-danger"><?php if (isset($message_display)) {
							echo $message_display;
							} ?></small>
			    	</div>
		    	</div>
		    </div>
		    <div class="row">
	    		<div class="col">
			    	<div class="form-group">
			      			<input type="password" class="form-control" placeholder="comfirm password" name="confirm-password" required>
			      			<small id="emailHelp" class="form-text text-danger"><?php if (isset($message_display)) {
							echo $message_display;
							} ?></small>
			    	</div>
		    	</div>
		    </div>
	    	<center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
	    		<input type="reset" class="btn btn-default" value="Reset">
	    		<a href="<?php echo base_url() ?>index.php/welcome/login_form/">Login</a>

	    	</center>
	  	</form>
	  </div>
	</div>
	<script type="text/javascript">
	// define variables
var nativePicker = document.querySelector('.nativeDatePicker');
var fallbackPicker = document.querySelector('.fallbackDatePicker');
var fallbackLabel = document.querySelector('.fallbackLabel');

var yearSelect = document.querySelector('#year');
var monthSelect = document.querySelector('#month');
var daySelect = document.querySelector('#day');

// hide fallback initially
fallbackPicker.style.display = 'none';
fallbackLabel.style.display = 'none';

// test whether a new date input falls back to a text input or not
var test = document.createElement('input');
test.type = 'text';

// if it does, run the code inside the if() {} block
if(test.type === 'text') {
  // hide the native picker and show the fallback
  nativePicker.style.display = 'none';
  fallbackPicker.style.display = 'block';
  fallbackLabel.style.display = 'block';

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while(daySelect.firstChild){
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  var dayNum;

  // 31 or 30 days?
  if(month === 'January' || month === 'March' || month === 'May' || month === 'July' || month === 'August' || month === 'October' || month === 'December') {
    dayNum = 31;
  } else if(month === 'April' || month === 'June' || month === 'September' || month === 'November') {
    dayNum = 30;
  } else {
  // If month is February, calculate whether it is a leap year or not
    var year = yearSelect.value;
    var leap = (year % 4 === 0 && year % 100 !== 0) || year % 400 === 0;
    dayNum = leap ? 29 : 28;
  }

  // inject the right number of new <option> elements into the day <select>
  for(i = 1; i <= dayNum; i++) {
    var option = document.createElement('option');
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if(previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if(daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  var date = new Date();
  var year = date.getFullYear();

  // Make this year, and the 100 years before it available in the year <select>
  for(var i = 0; i <= 100; i++) {
    var option = document.createElement('option');
    option.textContent = year-i;
    yearSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function() {
  populateDays(monthSelect.value);
}

monthSelect.onchange = function() {
  populateDays(monthSelect.value);
}

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function() {
  previousDay = daySelect.value;
}
	</script>
</body>