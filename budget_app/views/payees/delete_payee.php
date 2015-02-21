<div class='container'>
	<h2>Are you sure?</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Are you sure you want to remove this payee from the database:</div>
    <div class="panel-body">
      <?php echo $payee['name'] ?>
    </div>
  </div>
  <button class="btn btn-default" onClick="location.href='<?php echo $dir."delete_payee/".$payee['payee_id'] ?>'">Yes</button>
	<button class="btn btn-default" onClick="history.go(-1);return true;">No</button>
  
</div>