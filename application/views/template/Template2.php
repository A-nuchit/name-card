
  <?php
        $pic_bg = "assets/images/".$pic_bg;
        $pic_logo = "assets/images/".$pic_logo;
    ?>
<style type="text/css">
  .profile_2{
     position: absolute;
     z-index: 2;
     width: 80px;
     height: 80px;
     left: 37%;
  }
  .bg{
     position: absolute;
     z-index: 0;
     width: 80px;
     height: 80px;
     right: 50%;
  }
  .click{
    color: #fff;
  }
  name_2{
    font-size: 20px;
    color: #707070;
    float: right;
  }
  type_2{
    font-size: 15px;
    color: #707070;
  }

</style>
		<div class="container" style="padding-top: 20px; width: 30%">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100% ;">
            <div class="text">
              <name_2><?php echo $topic; ?></name_2>
              <type_2>(<?php if($type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type_2>
              <img class="profile_2" src="<?php echo base_url() . $pic_logo; ?>"><br>
              <timepost><?php echo $detail; ?><br></timepost>
              <contact>Contact</contact>
              <timepost><br><?php echo $name." ".$lastname ?></timepost>
              
              <?php
              if (isset($this->session->userdata['logged_in'])) {
              ?>
                <div class="row">
                  <div class="col-md-7">
                    <datail> E-mail : <?php echo $email; ?></datail>
                  </div>
                  <div class="col-md-5">
                    <datail> Tel : <?php echo $tel; ?></datail>
                  </div>
                </div>
                <?php if ($this->session->userdata['logged_in']['user_id'] != $user_id){ ?>
                    <last> Lastlogin : <?php echo $last_login; ?></last>
              <?php } 
            } ?>
            </div>
          </div>
      </div>