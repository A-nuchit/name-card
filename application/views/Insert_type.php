 <div class="container" style="width: 40% ">
<?php echo form_open_multipart('welcome/add_type'); ?>
    <form clas>
        <label style="color: #fff;">เพิ่มประเภทของงาน</label>       
            <div class="form-group">
                    <input type="text" class="form-control" placeholder="Work type" name="work_type" required>
            </div>
            <div class="form-group">
                <textarea rows= "5" type="text" name="work_type_dis" placeholder="Detail" class="form-control" required></textarea>
            </div>
        <center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
            <input type="reset" class="btn btn-default" value="Reset">
        </center>
    </form>
</div>