
  <?php
        $pic_bg = "assets/images/".$pic_bg;
        $pic_logo = "assets/images/".$pic_logo;
    ?>
<style type="text/css">
  .profile2{
    position: absolute;
     z-index: 2;
     width: 80px;
     height: 80px;
     left: 38%;
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
  name2{
    font-size: 18px;
    color: #fff;
    line-height: 1;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  topic2{
    font-size: 13px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  type2{
    font-size: 12px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  detail2{
    font-size: 12px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  email2{
    font-size: 12px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  tel2{
    font-size: 12px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }
  last2{
    font-size: 9px;
    color: #fff;
    text-shadow:1px 1px 1px #3D3D3D;
  }

</style>
    <div class="container" style="padding-top: 20px; width: 30%;" align="right">
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