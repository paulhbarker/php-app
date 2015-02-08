<div class='container'>
	<h2>Users</h2>

	<table class='table table-striped sortable'> 
	<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Creation</th>
    <th>Rights</th>
  </tr>

  <?php 
    foreach ($users as $user){ 
      if ($_SESSION['user']['rights'] < 4 && $user['cID'] == 1) {
      } else {
        echo "<tr>";
        echo "<td>".$user['last_name']."</td>";
        echo "<td>".$user['first_name']."</td>";
        echo "<td>".$user['email']."</td>";
        echo "<td>".$user['username']."</td>";
        echo "<td>".date("m/d/y", strtotime($user['creation_date']))."</td>";
        if ($user['rights'] == 1) {
          echo "<td>Admin</td>";
        } elseif ($user['rights'] >= 2) {
          echo "<td>User</td>";
        } 
        echo "<td><a href='".$dir."edit_user/".$user['user_id']."'>Edit</a></td>";
        echo "<td><a href='".$dir."c_delete_user/".$user['user_id']."'>Delete</a></td>";
        echo "</tr>";
      }
    }
  ?>

</table>

<a href="<?php echo $dir."add_user"?>">(+) Add new user</a>
</div>