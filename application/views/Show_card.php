
  <?php foreach($query as $r):
        $pic_bg = "assets/images/".$r->pic_bg;
        $pic_logo = "assets/images/".$r->pic_logo;
    ?>
<style type="text/css">
  .profile{
     position: absolute;
     z-index: 2;
     width: 80px;
     height: 80px;
     right: 37%;
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

</style>
		<div class="container" style="padding-top: 20px; width: 30%">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100% ;">
            <div class="text">
              <name><?php echo $r->topic; ?></name>
              <type>(<?php if($r->type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type>
                <img class="profile" src="<?php echo base_url() . $pic_logo; ?>"><br>
              <timepost><?php echo $r->detail; ?><br></timepost>
              <contact>Contact</contact>
              <timepost><br><?php echo $r->name." ".$r->lastname ?></timepost>
              
              <?php
              if (isset($this->session->userdata['logged_in'])) {
              ?>
                <div class="row">
                  <div class="col">
                    <p> E-mail : <?php echo $r->email; ?></p>
                  </div>
                  <div class="col">
                    <p> Tel : <?php echo $r->tel; ?></p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div><?php
          if (isset($this->session->userdata['logged_in'])) {
             if($this->session->userdata['logged_in']['user_id'] != $r->user_id){
                               $check = TRUE;
                               foreach($like_qurey as $l):
                                if($l->card_id == $r->card_id){
                                  $check = FALSE;
                                }
                               endforeach;
                               if ($check) {
                                ?> <a class="click" href='<?php echo base_url() ?>index.php/welcome/save_card?card_id=<?php echo $r->card_id ?>'> Save</a>
                        <?php }
                    }
                  else{?>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/del_card_user?card_id=<?php echo $r->card_id ?>'> Del</a>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/edit_card?card_id=<?php echo $r->card_id ?>'> Edit</a> <?php
                    }
                  }
                  ?>
      </div>
  <?php endforeach; ?>