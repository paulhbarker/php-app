<?php
session_start();
$_SESSION['user']['rights'] = 1;

$dir = '/cit313/budget_app/';
require $_SERVER['DOCUMENT_ROOT'].$dir.'control/model.php';

$r = explode('/', $_SERVER['REQUEST_URI']);
$s = explode('/',$_SERVER['SCRIPT_NAME']);
 
for ( $i= 0 ; $i < sizeof($s) ; $i++) {
  if ($r[$i] == $s[$i]) {
    unset($r[$i]);
  }
}

$command = array_values($r);

if ($command[0] == 'categories') {

  $title = 'Categories';
  $categories = get_category_totals();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/index.php';  

} else if ($command[0] == 'add_category') {
  
  if ( $_POST ){
    echo "submitted"; 
  } else {
    $title = 'Add Category';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/add_category.php';  
  }
    
} else if ($command[0] == 'payees') {

  $title = 'Payees';
  $payees = get_payee_totals();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/index.php';  
  
} else if ($command[0] == 'add_payee') {

  if ( $_POST ){
    echo "submitted"; 
  } else {
    $title = 'Add Payee';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/add_payee.php';  
  }

} else if ($command[0] == 'payments') {

  $title = 'Payments';
  $payments = get_payments();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payments/index.php';  

} else if ($command[0] == 'users') {

  $title = 'Users';
  $users = get_users();
  
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/index.php'; 
  
} else if ($command[0] == 'edit_user') {
  
  if ( $_POST ){
    echo "submitted"; 
  } else {
    $title = 'Edit User';
    $user = get_user($command[1]);
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/edit_user.php'; 
  }
  
} else if ($command[0] == 'add_user') {
  
  if ( $_POST ){
    echo "submitted"; 
  } else {
    $title = 'Add User';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/add_user.php';
  }
  
} else if ($command[0] == 'c_delete_user') {
  
  $title = 'Delete User';
  $user = get_user($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/delete_user.php';  
  
} else if ($command[0] == 'delete_user') {
  
  $title = 'Deletion Confirmed';
  $message = 'User sucessfully removed from the database.';
  //$user = delete_user($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';   
  
} else if ($command[0] == '') {

  $title = 'Home';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/home.php'; 

} else {
  
  $title = '404';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/404.php'; 

}

include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/footer.php'; 


?>
