<div class='container'>
  <h2>Payees</h2>
  <table class='table table-striped sortable'> 
    <tr>
      <th>Name</th>
      <th>Total Paid</th>
    </tr>
    <?php 
      foreach ($payees as $payee){ 
        echo "<tr>";
        echo "<td>".$payee['name']."</td>";
        echo "<td>$ ";
        if ( $payee['total'] == NULL) {
          echo "0.00</td>";
        } else {
          echo $payee['total']."</td>";
        }
        echo "<td><a href='".$dir."edit_payee/".$payee['payee_id']."'>Edit</a></td>";
        echo "<td><a href='".$dir."c_delete_payee/".$payee['payee_id']."'>Delete</a></td>";
        echo "</tr>";
      }
    ?>
    </table>
    <a href="<?php echo $dir."add_payee"?>">(+) Add new Payee</a>
</div>