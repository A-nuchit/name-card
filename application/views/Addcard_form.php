<div class="container" style="width: 40% ">
    <div class="border">
    <h2><center>Create Namecard</center></h2>
    <?php echo form_open_multipart('welcome/add_card'); ?>
    <?php if (isset($query)): ?>
    <form>
        <div class="form-group">
            <label class="mr-sm-2" style="color: #707070;">Type job</label>
            <select id="inputState" class="form-control" name="work_type">
            <?php foreach($query as $r):?>
                    <option value="<?php echo $r->work_id; ?>"><?php echo $r->nametype; ?></option>
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
            <select id="inputState" class="form-control" name="type_job">
                <option value="1" selected>Fulltime</option>
                <option value="2">Parttime</option>
            </select>
        </div>
        <label style="color: #707070;">Address work</label>
        <div class="row">
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="District" name="district" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Province" name="province" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Zip code" name="zip_code" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label style="color: #707070;">Profile logo in name card.</label>
                <input type="file" class="form-control" placeholder="File" name="pic_logo" required>
                <label style="color: #707070;">Backgound picture.</label>
                <input type="file" class="form-control" placeholder="File" name="pic_bg" required>

        <center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
            <input type="reset" class="btn btn-default" value="Reset">
        </center>
    </form>
    <?php endif; ?>
  </div>
</div>