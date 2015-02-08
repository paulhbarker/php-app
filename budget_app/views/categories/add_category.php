<div class='container'>
  <h2>Add Category</h2>

  <form action='<?php echo $dir."add_category"?>' method='post' class='form-horizontal' role='form'>
  
  <div class='form-group'>
	<label for="name" class='col-sm-3 control-label'>Category Name</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="name" value="<?php echo $name ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
  <div class="col-sm-offset-3 col-sm-4">
	<input class='btn btn-default' type="submit" name="submit" value="Add Category" />
	</div></div>



</div>