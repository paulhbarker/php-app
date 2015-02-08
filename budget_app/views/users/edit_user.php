<div class='container'>
  <h2>Edit User</h2>
  
  <form action='<?php echo $dir."edit_user/".$user['user_id'] ?>' method='post' class='form-horizontal' role='form'>
	<div class='form-group'>
	<label for="fname" class='col-sm-3 control-label'>First Name</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="fname" value="<?php echo $user['first_name'] ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="lname" class='col-sm-3 control-label'>Last Name</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="lname" value="<?php echo $user['last_name'] ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="email" class='col-sm-3 control-label'>Email</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
	<label for="username" class='col-sm-3 control-label'>Username</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="username" value="<?php echo $user['username'] ?>" size="50"/>
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
    <?php
      if ($user['rights'] == 1) {
        echo "<option value='1' selected>Admin</option>";
        echo "<option value='2'>User</option>";
      } else if ($user['rights'] == 2) {
        echo "<option value='1'>Admin</option>";
        echo "<option value='2' selected>User</option>";
      }
    ?>
  </select>
  </div></div>
  
  <div class='form-group'>
  <div class="col-sm-offset-3 col-sm-10">
	<input class='btn btn-default' type="submit" name="submit" value="Update User" />
	</div></div>
</form>
</div>