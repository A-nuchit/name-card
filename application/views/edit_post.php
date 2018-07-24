    <div class="container" style="width: 40% ">
        <div class="border">
        <h2><center>แก้ไขนามบัตร</center></h2>
        <?php echo form_open_multipart('welcome/add_post'); ?>
        <form>

            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="title" placeholder="Title" class="form-control"  required>
            </div>
            <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                <textarea rows= "5" type="text" name="content" placeholder="Content" class="form-control" required></textarea>
            </div>
            <div class="form-group">`
                <label class="mr-sm-2" style="color: #707070;">Type post</label>
                <select id="inputState" class="form-control" name="type">
                <option selected>Choose...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" placeholder="File" name="featured" required>
            </div>
            <center><button type="submit" class="btn btn-outline-secondary">ยืนยัน</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </center>
        </form>
      </div>
    </div>