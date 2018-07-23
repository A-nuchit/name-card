 <div  class="container" style=" width: 30%">
 <?php
          if (isset($this->session->userdata['logged_in'])) {
             if($this->session->userdata['logged_in']['user_id'] != $user_id){
                               $check = TRUE;
                               foreach($like_qurey as $l):
                                if($card_id == $l->card_id){
                                  $check = FALSE;
                                }
                               endforeach;
                               if ($check) {
                                ?> <a class="click" href='<?php echo base_url() ?>index.php/welcome/save_card?card_id=<?php echo $card_id ?>'> Save</a>

                        <?php }
                    }
                  else{?>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/del_card_user?card_id=<?php echo $card_id ?>'> Del</a>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/edit_card?card_id=<?php echo $card_id ?>'> Edit</a> <?php
                    }
                  }
                  ?>
                </div>