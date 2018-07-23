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
      <titlesel>Select template</titlesel>
    </center>
  </div>
  <form action="/action_page.php">
    <div class="row">
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/select_back?tem=Tem1'><img src="<?php echo base_url() . 'assets/images/tem1.png' ?>" style="width:100%"> </b>
      </div>
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/select_back?tem=Tem2'><img src="<?php echo base_url() . 'assets/images/tem2.png' ?>" style="width:100%"> </b>
      </div>
    </div>
    <div class="row" style="padding-top: 20px; padding-bottom: 20px">
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/select_back?tem=Tem3'><img src="<?php echo base_url() . 'assets/images/tem3.png' ?>" style="width:100%"> </b>
      </div>
      <div class="col-sm-6">
        <a class="click" href='<?php echo base_url() ?>index.php/welcome/select_back?tem=Tem4'><img src="<?php echo base_url() . 'assets/images/tem4.png' ?>" style="width:100%"> </b>
      </div>
    </div>
  </form>
</div>
</div>
 