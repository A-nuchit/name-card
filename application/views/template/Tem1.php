
  <?php
        $pic_bg = "assets/images/".$pic_bg;
        $pic_logo = "assets/images/".$pic_logo;
    ?>
    </style>
  <div class="col-sm-4">
		<div style="padding-top: 20px;">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100% ;"><center>
            <img class="profile1" src="<?php echo base_url() . $pic_logo; ?>"><br>
          
            
            <div class="text">
              <name1><?php echo $name."  ".$lastname ?><br></name1>
              <topic1><?php echo $topic; ?></topic1>
              <type1>(<?php if($type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type1>
              
              <detail1><br><?php echo $detail; ?></detail1>
              <?php
              if (isset($this->session->userdata['logged_in'])) {
              ?>
                    <email1><br> E-mail : <?php echo $email; ?></email1>
                    <tel1> Tel : <?php echo $tel; ?></tel1>

                
      <?php } ?>
            </div>
          </div>
          </center>
          <?php if ($this->session->userdata['logged_in']['user_id'] != $user_id){ ?>
            <last1>Lastlogin : <?php echo $last_login; ?></last1>
        <?php }?>
      </div>
  