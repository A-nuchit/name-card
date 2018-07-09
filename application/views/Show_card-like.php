
  <?php foreach($query as $r):
    $pic_bg = "assets/images/".$r->pic_bg;
    $pic_logo = "assets/images/".$r->pic_logo;
    ?>
<style type="text/css">
  .profile{
   position: absolute;
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
		<div class="container" style="padding-top: 20px; width: 30%;">
          <div class = "border_show" style="background-image:url(<?php echo base_url() . $pic_bg; ?>); background-size: 100%">
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
                    <div class="row">
                      <div class="col">
                        <p> E-mail : <?php echo $r->email; ?></p>
                      </div>
                      <div class="col">
                        <p> Tel : <?php echo $r->tel; ?></p>
                      </div>
                    </div>
          </div>    
          <a class="click" href='<?php echo base_url() ?>index.php/welcome/del_card_like?card_id=<?php echo $r->card_id ?>'> Del</a>
      </div>
  <?php endforeach; ?>