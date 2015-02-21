<div class='container'>
  <h2>Login</h2>
  <?php 
    if (!empty($message)){
      echo "<div class='alert alert-danger'>".$message."</div>";
    }
  ?>
  <div class='row'>
    <div class='col-md-4 col-md-offset-4'>
      <form action='<?php echo $dir."login"?>' method='post' class='form-horizontal' role='form'>
      
      <div class='form-group'>
        <input type="text" class="form-control" name="username" placeholder='Username' >
      </div>
      <div class='form-group'>
        <input type="password" class="form-control" name="password" placeholder='Password' >
      </div>
      <div class='text-center'>
        <input class='btn btn-default' type="submit" name="submit" value="Login" />
      </div>
      </form>
    </div>
  </div>
</div>