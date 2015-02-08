<div class='container'>
	<h2>Are you sure?</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Are you sure you want to remove this person from the user database:</div>
    <div class="panel-body">
      <?php echo $user['first_name'].' '.$user['last_name'] ?>
    </div>
  </div>
  <button class="btn btn-default" onClick="location.href='<?php echo $dir."delete_user/".$user['user_id'] ?>'">Yes</button>
	<button class="btn btn-default" onClick="history.go(-1);return true;">No</button>
  
</div>