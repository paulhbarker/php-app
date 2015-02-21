<div class='container'>
  <h2>Edit Payment</h2>

  <form action='<?php echo $dir."edit_payment/".$payment['payment_id'] ?>' method='post' class='form-horizontal' role='form'>
  
  <div class='form-group'>
  <label for="payee" class='col-sm-3 control-label'>Payee</label>
  <div class='col-sm-4'>
  <select class='form-control' name='payee'>
    <?php
      foreach($payees as $payee){
        if ($payment['payee_id'] == $payee['payee_id']){
          echo "<option value='".$payee['payee_id']."' selected>".$payee['name']."</option>"; 
        } else {
          echo "<option value='".$payee['payee_id']."'>".$payee['name']."</option>"; 
        }
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
        if ($payment['category_id'] == $category['category_id']){
          echo "<option value='".$category['category_id']."' selected>".$category['name']."</option>";
        } else {
          echo "<option value='".$category['category_id']."'>".$category['name']."</option>";
        }
      }
    ?>
  </select>
  </div></div>
  
  <div class='form-group'>
	<label for="sum" class='col-sm-3 control-label'>Amount ($)</label>
  <div class="col-sm-4">
	<input type="text" class="form-control" name="sum" value="<?php echo $payment['sum'] ?>" size="50"/>
	</div></div>
  
  <div class='form-group'>
  <div class="col-sm-offset-3 col-sm-4">
	<input class='btn btn-default' type="submit" name="submit" value="Edit Payment" />
	</div></div>



</div>