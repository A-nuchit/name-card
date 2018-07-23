<div class="container" style="width: 40% ">
    <div class="border">
    <h2><center>Edit Namecard</center></h2>
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
            <label style="color: #707070;">Name job</label>
            <input type="text"  class="form-control" name="topic" placeholder="NameJob" class="form-control" value="<?php echo $r->topic ?>" required>
        </div>
        <div class="form-group">
            <label style="color: #707070;">Detail</label>
            <textarea rows= "5" type="text" name="detail" placeholder="Detail" class="form-control" value="<?php echo $r->detail; ?>" required><?php echo $r->detail; ?></textarea>
        </div>
            </fieldset>
            <div style="display: none;">
        	<input type="text"  class="form-control" name="card" placeholder="Card ID" class="form-control" value="<?php echo $r->card_id ?>" required>
        </div>
         <div class="form-group">
            <label class="mr-sm-2" style="color: #707070;">Type time</label>
            <select id="inputState" class="form-control" name="type_job">
                <option value="1" <?php echo $job ?> >Fulltime</option>
                <option value="2" <?php echo $job_no  ?> >Parttime</option>
            </select>
        </div>
        <label style="color: #707070;">Address work</label>
        <div class="row">
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="District" name="district" value="<?php echo $r->district_card ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Province" name="province" value="<?php echo $r->province_card ?>"required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Zip code" name="zip_code" value="<?php echo $r->zip_code_card ?>"required>
                    </div>
                </div>
            </div>
        <center><button type="submit" class="btn btn-outline-secondary">Update</button>
            <input type="reset" class="btn btn-default" value="Reset">
        </center>
    </form>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>