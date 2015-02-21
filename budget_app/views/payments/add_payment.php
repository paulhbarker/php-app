<div class='container'>
  <h2>Add Payment</h2>

  <form action='<?php echo $dir."add_payment"?>' method='post' class='form-horizontal' role='form'>
  
  <div class='form-group'>
  <label for="payee" class='col-sm-3 control-label'>Payee</label>
  <div class='col-sm-4'>
  <select class='form-control' name='payee'>
    <?php
      foreach($payees as $payee){
        echo "<option value='".$payee['payee_id']."'>".$payee['name']."</option>"; 
      }
    ?>
  </select>
  </div></div>
  
  <div class='form-group'>
  <label for="category" class='col-sm-3 control-label'>Category</label>
  <div class='col-sm-4'>
  <select class='form-control' name='category'>
    <?php
      foreach($categories as $category){
        echo "<option value='".$category['category_id']."'>".$category['name']."</option>"; 
      }
    ?>
  </select>
  </div></div>
  
  <div class='form-group'>
	<label for="sum" class='col-sm-3 control-label'>Amount ($)</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="sum" value="<?php echo $sum ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
  <div class="col-sm-offset-3 col-sm-4">
	<input class='btn btn-default' type="submit" name="submit" value="Add Payment" />
	</div></div>



</div>