<div class='container'>
	<h2>Are you sure?</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Are you sure you want to remove this payment from the database:</div>
    <div class="panel-body">
      <?php echo "TO: ".$payment['pName']."<br>CATEGORY: ".$payment['cName']."<br>AMOUNT: $".$payment['sum'] ?>
    </div>
  </div>
  <button class="btn btn-default" onClick="location.href='<?php echo $dir."delete_payment/".$payment['payment_id'] ?>'">Yes</button>
	<button class="btn btn-default" onClick="history.go(-1);return true;">No</button>
  
</div>