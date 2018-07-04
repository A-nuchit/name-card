<?php echo form_open_multipart('welcome/searchs'); ?>
<?php if (isset($query)): ?>
	<body>
	<div class="container" style="width: 40%; color: #fff;">
        <form class="form-inline" style="padding-top: 30px">
          	<div class="form-group">
          			<label for="bday">Type Job</label>
		            <select id="inputState" class="form-control" name="type_job">
			            <option selected value="*">All</option>
			            <?php foreach($query as $r):?>
			                    <option value="<?php echo $r->nametype; ?>"><?php echo $r->nametype; ?></option>
			                </tr>
			            <?php endforeach; ?>
		            </select>
        	</div>
              <input type="text" class="form-control" name="word" required>
              <center>
              	<button type="submit" class="btn btn-outline-light" style="margin-top: 15px ">Search</button>
              </center>
          </div>
        </form>
    </div>
<?php endif; ?>
</body>