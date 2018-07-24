<style type="text/css">
	.profile_pic{
		border: 7px solid #fff;
    	border-radius: 50%;
    	padding: 4px;
    	width: 180px;
    	height: 180px;
    	box-shadow: 1px 1px 5px #000;
    	display: block;
    	margin-left: auto;
    	margin-right: auto;
	}
	.name_profile{
		font-weight: lighter;
		color: #474646;
	}
	.big_profile{
		padding-top: 20px;
		font-size: 50px;
		line-height: 0.1;
		font-weight: bold;
	}
	.small_profile{
		font-size: 25px;
		line-height: 0.1;
		padding-bottom: 30px;
	}
	.edit_icon{
		color: #474646;
		font-size: 15px;
	}
	.profile_bor{
		border: 1px solid #fff;
		background-color: #fff;
		color: #474646;
		padding: 15px 15px 15px 15px;
		border-radius: 8px;
	}
	.from_center{
		display: block;
    	margin-left: auto;
    	margin-right: auto;
	}
	.icon-size{
		font-size: 12px;
	}
	namepop{
		color: #474646;
		font-size: 15px;
	}
	namehead{
		color: #464646;
		font-size: 22px;
	}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #c4c4c4;
    color: white;
}

.modal-body {
	padding: 2px 16px;
}
</style>
<div>
	<?php foreach ($query as $r) {
	} ?>
	
	<div class="from_center" style="width: 70%;">
		<div class="row">
			<div style="padding: 60px 60px 30px 60px; float: left;" >
				<?php $img_profile = "assets/images/".$this->session->userdata['logged_in']['username'].".png"; ?>
				<img class="profile_pic" src="<?php echo base_url() . $img_profile ?>" >	 
			</div>
			<div style="padding: 90px 60px 30px 3px;" class="name_profile">
				<div class="big_profile"> 
					<?php echo $r->name."  ".$r->lastname."  "; ?> <a class="edit_icon"  id="myBtn" href="#"><i class="fa fa-pencil"></i></a>
				</div><br>
				<div class="small_profile">
					<?php echo $r->username." "; ?><a class="edit_icon" href="#"></a>
				</div>
				
			</div>
		</div>
		<div style="width: 35%; float: left; padding-right: 30px;">
			<div class="profile_bor">
				<i class="Small material-icons">email</i>  E-mail : <?php echo $r->email." "; ?><br>
				<i class="Small material-icons">phone</i>  โทรศัพท์ : <?php echo $r->tel." "; ?><br>
				<i class="Small material-icons">cake</i>  วันเกิด : <?php echo $r->day." ".$r->month." ".$r->year." "; ?><br>
				<i class="Small material-icons">person_pin_circle</i>  ที่อยู่ : <?php echo $r->district." ".$r->province." ".$r->zip_code; ?><br>
			</div>
			<div style="padding-top: 15px">
				<a class="btn btn-light" href="<?php echo base_url() ?>index.php/welcome/edit_member">แก้ไข</a>
			</div>
		</div>
		<div style="width: 65%; float: right;">
			<div class="profile_bor">
				Sidebar . . . . . . . . . . . . . . .  .
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    
   	<div class="modal-header">
   		<namehead>แก้ไขชื่อ-นามสกุล</namehead>
      <span class="close">&times;</span>
    </div>
    <?php echo form_open_multipart('welcome/update_name'); ?>
    <form>
    	<div class="row from_center" style="width: 60%; padding-top: 20px">
    		<div class="col">
			    <div class="form-group">
			    	<namepop>ชื่อ</namepop>
				    <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $r->name?>" required>
				    <small id="emailHelp" class="form-text text-danger"></small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
			    	<namepop>นามสกุล</namepop>
				    <input type="text" class="form-control" placeholder="lastname" name="lastname" value="<?php echo $r->lastname?>" required>
				    <small id="emailHelp" class="form-text text-danger"></small>
				</div>
			</div>
	    </div>
	    <div class="row from_center" style="padding-bottom: 20px" >
	    	<center>
	    		<button type="submit" class="btn btn-outline-secondary">บันทึก</button>
	    	</center>
	    </div>
	</form>

  </div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>