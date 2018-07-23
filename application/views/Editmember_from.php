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
  namebox{
    font-size: 15px;
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
	  	<h2><center>แก้ไขข้อมูลส่วนตัว<br></center></h2>
	  	<?php echo form_open_multipart('welcome/update_member'); ?>
      <?php foreach ($query as $r ):?>
        <?php 
          $st_1 = " ";
          $st_2 = " ";
          if ($r->gender == "1") {
              $st_1 = "checked";
          }
          else{
              $st_2 = "checked";
          } ?>
	  	<form>
	  		<div class="row">
	  			<div class="col">
		    		<div class="form-group">
              <namebox>ชื่อ</namebox>
	      			<input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $r->name?>" required>
	      			<small id="emailHelp" class="form-text text-danger"></small>
		    		</div>
		    	</div>
		    	<div class="col">
		    		<div class="form-group">
              <namebox>นามสกุล</namebox>
		      		<input type="text" class="form-control" placeholder="lastname" name="lastname" value="<?php echo $r->lastname?>" required>
		    		</div>
	    		</div>
	    	</div>
	    	<div style="padding-bottom: 7px;">
           <namebox>เพศ</namebox>
		    	<div class="form-check form-check-inline">
	  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" <?php echo $st_1; ?>>
	  				<label class="form-check-label" for="inlineRadio1">ชาย</label>
				  </div>
				  <div class="form-check form-check-inline">
	  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" <?php echo $st_2; ?>>
	  				<label class="form-check-label" for="inlineRadio2">หญิง</label>
				  </div>
			  </div>
        <center>
          <label>วัน/เดือน/ปีเกิด</label>
        </center>
        <div class="row">
          
			    <div class="col">
            <div class="form-group">
                <namebox>วัน</namebox>
                <input type="text" class="form-control" placeholder="lastname" name="lastname" value="<?php echo $r->day?>" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
  			      <namebox>เดือน</namebox>
    			    <select class="form-control" name="month">
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
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <namebox>ปี</namebox>
                <input type="text" class="form-control" placeholder="lastname" name="lastname" value="<?php echo $r->year?>" required>
            </div>
          </div>
        </div>
        

		    <center>
          <label>ที่อยู่</label>
        </center>
        <div class="row">
                <div class="col">
                    <div class="form-group">
                      <namebox >อำเภอ</namebox>
                      <input type="text" class="form-control" placeholder="District" name="district" value="<?php echo $r->district ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <namebox >จังหวัด</namebox>
                      <input type="text" class="form-control" placeholder="Province" name="province" value="<?php echo $r->province ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <namebox >รหัสไปรษณีย์</namebox>
                      <input type="text" class="form-control" placeholder="Zip code" name="zip_code" 
                            value="<?php echo $r->zip_code ?>" required>
                    </div>
                </div>
            </div>
	    	<center>
          <select class="image-picker show-html">
  <option value=""></option>
  <option data-img-src="http://placekitten.com/300/200" value="1">Cute Kitten 1</option>
  <option data-img-src="http://placekitten.com/150/200" value="2">Cute Kitten 2</option>
  <option data-img-src="http://placekitten.com/400/200" value="3">Cute Kitten 3</option>
</select>
          <select name="selectBox1">
            <option value="img1.png" style="background-color: #000;">male</option>
            <option value="img2.png" style="background-image:url(img2.png);">female</option>
            <option value="img2.png" style="background-image:url(img3.png);">others</option>
          </select> 
          <button type="submit" class="btn btn-outline-secondary">บันทึก</button>
	    	</center>
	  	</form>
    <?php endforeach;?>
	  </div>
	</div>
<script type="text/javascript">
  $("select").imagepicker()
</script>
</body>