 <div style=" width: 30%; text-shadow:1px 1px 5px #000;">
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
                                ?> <a class="click" href='<?php echo base_url() ?>index.php/welcome/save_card?card_id=<?php echo $card_id ?>'>บันทึก</a>

                        <?php }
                    }
                  else{?>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/del_card_user?card_id=<?php echo $card_id ?>'>ลบ</a>
                      <a class="click" href='<?php echo base_url() ?>index.php/welcome/edit_card?card_id=<?php echo $card_id ?>'>แก้ไข</a> <?php
                    }
                  }
                  ?>
</div>
</div>