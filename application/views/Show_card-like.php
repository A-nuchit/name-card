
  <?php foreach($query as $r):?>
		<div class="container" style="padding-top: 20px; width: 40%">
          <div class = "border_show">
              <name><?php echo $r->topic; ?></name>
              <type>(<?php if($r->type_job == 1){
                echo "Fulltime";
                }
                else{
                  echo "Parttime";
                }?>)</type><br>
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
                    <a href='<?php echo base_url() ?>index.php/welcome/del_card_like?card_id=<?php echo $r->card_id ?>'> Del</a>
          </div>
      </div>
  <?php endforeach; ?>