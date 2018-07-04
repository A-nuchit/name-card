<div class="container" style="width: 40% ">
    <div class="border">
    <h2><center>Create Namecard</center></h2>
    <?php echo form_open_multipart('welcome/add_card'); ?>
    <?php if (isset($query)): ?>
    <form>
        <div class="form-group">
            <label class="mr-sm-2" style="color: #707070;">Type job</label>
            <select id="inputState" class="form-control" name="type_job">
            <option selected>Choose...</option>
            <?php foreach($query as $r):?>
                    <option value="<?php echo $r->type_id; ?>"><?php echo $r->nametype; ?></option>
                </tr>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="topic" placeholder="NameJob" class="form-control" required>
        </div>
        <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
            <textarea rows= "5" type="text" name="detail" placeholder="Detail" class="form-control" required></textarea>
        </div>
         <div class="form-group">
            <label class="mr-sm-2" style="color: #707070;">Type time</label>
            <select id="inputState" class="form-control" name="type_time">
                <option value="full" selected>Fulltime</option>
                <option value="part">Parttime</option>
            </select>
        </div>
        
        <center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
            <input type="reset" class="btn btn-default" value="Reset">
        </center>
    </form>
    <?php endif; ?>
  </div>
</div>