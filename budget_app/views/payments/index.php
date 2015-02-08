<div class='container'>
  <h2>Payments</h2>
  <table class='table table-striped sortable'> 
    <tr>
      <th>Payee</th>
      <th>Category</th>
      <th>Credit</th>
    </tr>
    <?php 
      foreach ($payments as $payment){ 
        echo "<tr>";
        echo "<td>".$payment['pName']."</td>";
        echo "<td>".$payment['cName']."</td>";
        echo "<td>$ ".$payment['sum']."</td>";
        echo "<td><a href='".$dir."edit_payment/".$payment['payment_id']."'>Edit</a></td>";
        echo "<td><a href='".$dir."c_delete_payment/".$payment['payment_id']."'>Delete</a></td>";
        echo "</tr>";
      }
    ?>
    </table>
    <a href="<?php echo $dir."add_payment"?>">(+) Add new Payment</a>
</div>