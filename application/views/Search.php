<?php echo form_open_multipart('welcome/searchs'); ?>
<?php if (isset($query)): ?>
	<body>
	<div class="container" style="width: 40%; color: #fff;">
        <form class="form-inline" style="padding-top: 30px">
          	
            <label>Search work</label>
            <input type="text" placeholder="All work" class="form-control" name="word" >
            <dir class="row" style="padding-right:40px">  
                <div class="col">
                  <div class="form-group">
                    <label>Type Job</label>
                    <select class="form-control" name="type_job">
                      <option selected value="*">All</option>
                      <?php foreach($query as $r):?>
                          <option value="<?php echo $r->nametype; ?>"><?php echo $r->nametype; ?></option>
                          </tr>
                          <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label >Select plance work</label>
                    <select class="form-control" name="province">
                      <option value="*">All Province</option>
                      <option>BKK</option>
                      <option>HKT</option>
                      <option>CNX</option>
                    </select>
                  </div>
                </div>
            </dir>
              <center>
              	<button type="submit" class="btn btn-outline-light">Search</button>
              </center>
          </div>
        </form>
    </div>
<?php endif; ?>
</body>