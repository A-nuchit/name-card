<style type="text/css">
    titlesel{
        color: #707070;
        font-size: 40px;
    }
    a:hover{
      opacity: 2;

    }
    a{
      opacity: 0.6;
    }
</style>
<div class="container" style="width: 50%" >
<div class="border">
  <div style="padding-bottom: 30px">
    <center>
      <titlesel>เลือกพื้นหลัง</titlesel>
    </center>
  </div>
    <label style="color: #707070; font-size: 20px;">คลิกเพื่อเลือกพื้นหลัง</label>
    <div class="row">
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/create_card?back=bg_tem1.jpg&tem=<?php echo $back ?>'><img src="<?php echo base_url() . 'assets/image/bg_tem1.jpg' ?>" style="width:100%"> </a>
      </div>
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/create_card?back=bg_tem2.jpg&tem=<?php echo $back ?>'><img src="<?php echo base_url() . 'assets/image/bg_tem2.jpg' ?>" style="width:100%"> </a>
      </div>
    </div>
    <div class="row" style="padding-top: 20px; padding-bottom: 20px">
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/create_card?back=bg_tem3.jpg&tem=<?php echo $back ?>'><img src="<?php echo base_url() . 'assets/image/bg_tem3.jpg' ?>" style="width:100%"> </a>
      </div>
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/create_card?back=bg_tem4.jpg&tem=<?php echo $back ?>'><img src="<?php echo base_url() . 'assets/image/bg_tem4.jpg' ?>" style="width:100%"> </a>
      </div>
    </div>
    <center>
      <!-- <div style="font-size: 40px; color: #707070 ;">Or</div> -->
    </center>
    <label style="color: #707070; font-size: 20px;">กำหนดพื้นหลังด้วยตัวเอง</label>
    <div class="form-group" style="display: none;">
      <input type="text" name="tem" class="form-control" value="<?php echo $back; ?>" >
    </div>
    <?php echo form_open_multipart('welcome/create_card'); ?>
    <form>
    <div  style="display: none;">
      <input type="text" name="tem" value="<?php echo $back ?>">
    </div>
    <div class="form-group"">
      <label style="color: #707070; font-size: 15px;">นำเข้ารูปภาพ</label>
      <input type="file" class="form-control" placeholder="File" name="pic_bg" required>
       <div style="padding-top: 10px">
          <center>
            <button type="submit" class="btn btn-outline-secondary">อัพโหลด</button>
          </center>
      </div>
    </div>
  </form>
</div>
</div>
 