<style type="text/css">
   namebox2{
    font-size: 15px;
     color: #707070;
  }
</style>
<div class="container" style="width: 40% ">
    <div class="border">
    <h2><center>แก้ไขนามบัตร</center></h2>
    <?php echo form_open_multipart('welcome/update_card'); ?>
    <?php if (isset($query)): ?>
    <form>
    	<?php foreach($query as $r):
    			if ($r->type_job == 1) {
    				$job = "selected";
    				$job_no = "";    			
    			}
    			else {
    				$job = "";
    				$job_no = "selected"; 
    			}
    		?>
    		<fieldset disabled>
        <div class="form-group">
            <label style="color: #707070;">ชื่อนามบัตร</label>
            <input type="text"  class="form-control" name="topic" placeholder="NameJob" class="form-control" value="<?php echo $r->topic ?>" required>
        </div>
        <div class="form-group">
            <label style="color: #707070;">รายละเอียด</label>
            <textarea rows= "5" type="text" name="detail" placeholder="Detail" class="form-control" value="<?php echo $r->detail; ?>" required><?php echo $r->detail; ?></textarea>
        </div>
            </fieldset>
            <div style="display: none;">
        	<input type="text"  class="form-control" name="card" placeholder="Card ID" class="form-control" value="<?php echo $r->card_id ?>" required>
        </div>
         <div class="form-group">
            <label class="mr-sm-2" style="color: #707070;">ประเภทการทำงาน</label>
            <select id="inputState" class="form-control" name="type_job">
                <option value="1" <?php echo $job ?> >Fulltime</option>
                <option value="2" <?php echo $job_no  ?> >Parttime</option>
            </select>
        </div>
        <label style="color: #707070;">ที่อยู่ในการทำงาน</label>
        <div class="row">
                <div class="col">
                    <div class="form-group">
                        <namebox2>อำเภอ</namebox2>
                        <input type="text" class="form-control" placeholder="District" name="district" value="<?php echo $r->district_card ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <namebox2>จังหวัด</namebox2>
                        <input type="text" class="form-control" placeholder="Province" name="province" value="<?php echo $r->province_card ?>"required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <namebox2>รหัสไปรษณี</namebox2>
                        <input type="text" class="form-control" placeholder="Zip code" name="zip_code" value="<?php echo $r->zip_code_card ?>"required>
                    </div>
                </div>
            </div>
        <center><button type="submit" class="btn btn-outline-secondary">แก้ไข</button>
            <input type="reset" class="btn btn-default" value="Reset">
        </center>
    </form>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>