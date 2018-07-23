
  <?php
        $pic_bg = "assets/images/".$pic_bg;
        $pic_logo = "assets/images/".$pic_logo;
    ?>
<div class="col-sm-4">
    <div style="padding-top: 20px;" align="right">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100% ;">
            <img class="profile2" src="<?php echo base_url() . $pic_logo; ?>">
            <div class="text">
              <name1><?php echo $name."  ".$lastname ?><br></name1>
              <topic2><?php echo $topic; ?></topic2>
              <type2>(<?php if($type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type2>
              
              <detail2><br><?php echo $detail; ?><br></detail2>
              <?php
              if (isset($this->session->userdata['logged_in'])) {
              ?>
                    <tel2> Tel : <?php echo $tel; ?><br></tel2>
                    <email2>E-mail : <?php echo $email; ?></email2>

                
                    
            <?php } ?>
            </div>
          </div>
          <?php if ($this->session->userdata['logged_in']['user_id'] != $user_id){ ?>
          <last2>Lastlogin : <?php echo $last_login; ?></last2>
          <?php } ?>
      </div>