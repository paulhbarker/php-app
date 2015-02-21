<div class='container'>
	<h2>Are you sure?</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Are you sure you want to remove this category from the database:</div>
    <div class="panel-body">
      <?php echo $category['name'] ?>
    </div>
  </div>
  <button class="btn btn-default" onClick="location.href='<?php echo $dir."delete_category/".$category['category_id'] ?>'">Yes</button>
	<button class="btn btn-default" onClick="history.go(-1);return true;">No</button>
  
</div>