
  <?php
        $pic_bg = "assets/images/".$pic_bg;
        $pic_logo = "assets/images/".$pic_logo;
    ?>
<div class="col-sm-4">
		<div style="padding-top: 20px;">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100% ;">
            <div class="text">
              <name><?php echo $topic; ?></name>
              <type>(<?php if($type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type>
                <img class="profile" src="<?php echo base_url() . $pic_logo; ?>"><br>
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
               
                   
              <?php } ?>
            </div>
          </div>
          <?php if ($this->session->userdata['logged_in']['user_id'] != $user_id){ ?>
            <last2>Lastlogin : <?php echo $last_login; ?></last2>
          <?php } ?>
      </div>