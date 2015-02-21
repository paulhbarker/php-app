<div class='container'>
  <h2>Categories</h2>
  <table class='table table-striped sortable'> 
    <tr>
      <th>Name</th>
      <th>Total Paid</th>
    </tr>
    <?php 
      foreach ($categories as $category){ 
        echo "<tr>";
        echo "<td>".$category['name']."</td>";
        echo "<td>$ ";
        if ( $category['total'] == NULL) {
          echo "0.00</td>";
        } else {
          echo $category['total']."</td>";
        }
        echo "<td><a href='".$dir."edit_category/".$category['category_id']."'>Edit</a></td>";
        echo "<td><a href='".$dir."c_delete_category/".$category['category_id']."'>Delete</a></td>";
        echo "</tr>";
      }
    ?>
    </table>
    <a href="<?php echo $dir."add_category"?>">(+) Add new Category</a>
</div>