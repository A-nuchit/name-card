<?php echo form_open_multipart('welcome/searchs'); ?>
<?php if (isset($query)): ?>
<div class="point">
	<div class="container" style="width: 40%; color: #fff;">
        <form class="form-inline" style="padding-top: 30px">
            <label style="color: #727272;">ค้นหางาน</label>
            <input type="text" placeholder="งานทั้งหมด" class="form-control" name="word" >
                <div style="width: 48%; float: left;">
                  <div class="form-group">
                    <label style="color: #727272;">ประเภท</label>
                    <select class="form-control" name="type_job">
                      <option selected value="*">ทุกปประเภท</option>
                      <?php foreach($query as $r):?>
                          <option value="<?php echo $r->nametype; ?>"><?php echo $r->nametype; ?></option>
                          </tr>
                          <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div style="width: 48%; float: right;">
                  <div class="form-group">
                    <label style="color: #727272;">จังหวัด</label>
                    <select class="form-control" name="province">
                      <option value="*">จังหวัดทั้งหมด</option>
                      <option>BKK</option>
                      <option>HKT</option>
                      <option>CNX</option>
                    </select>
                  </div>
                </div>

              <center>
              	<button type="submit" class="btn btn-secondary">ค้นหา</button>
              </center>
          </div>
        </form>
    </div>
  </div>
<?php endif; ?>