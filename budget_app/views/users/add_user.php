<div class='container'>
  <h2>Add User</h2>

	<form action='<?php echo $dir."add_user"?>' method='post' class='form-horizontal' role='form'>
	<div class='form-group'>
	<label for="fname" class='col-sm-3 control-label'>First Name</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="lname" class='col-sm-3 control-label'>Last Name</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="lname" value="<?php echo $lname ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="email" class='col-sm-3 control-label'>Email</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="email" value="<?php echo $email ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="username" class='col-sm-3 control-label'>Username</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="username" value="<?php echo $username ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="password" class='col-sm-3 control-label'>Password</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="password" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="passconf" class='col-sm-3 control-label'>Confirm Password</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="passconf" size="50" />
  </div></div>
  
  <div class='form-group'>
  <label for="rights" class='col-sm-3 control-label'>Rights</label>
  <div class='col-sm-4'>
  <select class='form-control' name='rights'>
    <option value='1'>Admin</option>
    <option value='2'>User</option>
  </select>
  </div></div>
  
  <div class='form-group'>
  <div class="col-sm-offset-3 col-sm-4">
	<input class='btn btn-default' type="submit" name="submit" value="Add User" />
	</div></div>
</form>
</div>