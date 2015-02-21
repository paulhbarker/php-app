<?php
session_start();

$dir = '/cit313/budget_app/';
require $_SERVER['DOCUMENT_ROOT'].$dir.'control/model.php';

$r = explode('/', $_SERVER['REQUEST_URI']);
$s = explode('/',$_SERVER['SCRIPT_NAME']);
 
for ( $i= 0 ; $i < sizeof($s) ; $i++) {
  if ($r[$i] == $s[$i]) {
    unset($r[$i]);
  }
}

function removeTags($input){
	$cleanInput = filter_var($input, FILTER_SANITIZE_STRING);
	return $cleanInput;
}
function specialChars($input){
	$cleanInput = filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
	return $cleanInput;
}
function clean($input){
	$cleanInput = filter_var($input, FILTER_SANITIZE_EMAIL);
	return $cleanInput;
}
function numbers($input){
	$cleanInput = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
	return $cleanInput;
}

$command = array_values($r);

if ($command[0] == 'login') {

  if ( $_POST ) {
    $username = specialChars(trim($_POST['username']));
    $password = specialChars(trim($_POST['password']));
	
    if (empty($username) || empty($password)) {
      $title = 'Login';
      $message = 'One or more fields are empty.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/login.php';
    } 
    $user = get_user_by_username($username);
    
    if ( is_array($user) ) {
      $result = validate_password($password, $user['password']);
      
      if ( $result ) {
        $_SESSION['user'] = $user;
        $title = 'Home';
        include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
        include $_SERVER['DOCUMENT_ROOT'].$dir.'views/home.php';
      } else {
        $title = 'Login';
        $message = "Incorrect username or password.";
        include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
        include $_SERVER['DOCUMENT_ROOT'].$dir.'views/login.php';
      }
    } else {
      $title = 'Login';
      $message = "Incorrect username or password.";
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/login.php';
    }
    
  } else {
    $title = 'Login';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/login.php';
  }

} else if ($command[0] == 'logout') {
  session_destroy(); 
  header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
} else if ($command[0] == 'categories') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $title = 'Categories';
  $categories = get_category_totals();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/index.php';  

} else if ($command[0] == 'add_category') {
   if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  } 
  if ( $_POST ){
    
    $name = $_POST['name'];
    $createdBy = $_SESSION['user']['user_id'];
    
    $result = add_category($name, $createdBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Category sucessfully added to database';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Category failed to be added to the database.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Add Category';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/add_category.php';  
  }
  
} else if ($command[0] == 'edit_category') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $category = get_category($command[1]);
  if ( $_POST ){
    
    $categoryid = $command[1];
    $name = $_POST['name'];
    $updatedBy = $_SESSION['user']['user_id'];
    
    $result = update_category($categoryid, $name, $updatedBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Category sucessfully updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Category failed to be updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Edit Category';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/edit_category.php';  
  }

} else if ($command[0] == 'c_delete_category') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  } 
  $title = 'Delete Category';
  $category = get_category($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/categories/delete_category.php';  
  
} else if ($command[0] == 'delete_category') {
   if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  } 
  $title = 'Deletion Confirmed';
  $message = 'Category sucessfully removed from the database.';
  $category = delete_category($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
 
} else if ($command[0] == 'payees') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $title = 'Payees';
  $payees = get_payee_totals();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/index.php';  
  
} else if ($command[0] == 'add_payee') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  if ( $_POST ){
    
    $name = $_POST['name'];
    $createdBy = $_SESSION['user']['user_id'];
    
    $result = add_payee($name, $createdBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Payee sucessfully added to database';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Payee failed to be added to the database.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Add Payee';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/add_payee.php';  
  }

} else if ($command[0] == 'edit_payee') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $payee = get_payee($command[1]);
  if ( $_POST ){
    
    $payeeid = $command[1];
    $name = $_POST['name'];
    $updatedBy = $_SESSION['user']['user_id'];
    
    $result = update_payee($payeeid, $name, $updatedBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Payee sucessfully updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Payee failed to be updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Edit Payee';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/edit_payee.php';  
  }
  
} else if ($command[0] == 'c_delete_payee') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Delete Payee';
  $payee = get_payee($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payees/delete_payee.php';  
  
} else if ($command[0] == 'delete_payee') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Deletion Confirmed';
  $message = 'Payee sucessfully removed from the database.';
  $payee = delete_payee($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';

} else if ($command[0] == 'payments') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $title = 'Payments';
  $payments = get_payments();
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payments/index.php'; 
  
} else if ($command[0] == 'add_payment') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $payees = get_payees();
  $categories = get_categories();


  if ( $_POST ){
    
    $payeeid = $_POST['payee'];
    $categoryid = $_POST['category'];
    $sum = $_POST['sum'];
    $createdBy = $_SESSION['user']['user_id'];
    
    $result = add_payment($payeeid, $categoryid, $sum, $createdBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Payment sucessfully added to database';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Payment failed to be added to the database.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Add Payment';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payments/add_payment.php';  
  } 
  
} else if ($command[0] == 'edit_payment') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $payees = get_payees();
  $categories = get_categories();
  $payment = get_payment($command[1]);

  if ( $_POST ){
    
    $paymentid = $command[1];
    $payeeid = $_POST['payee'];
    $categoryid = $_POST['category'];
    $sum = $_POST['sum'];
    $updatedBy = $_SESSION['user']['user_id'];
    
    $result = update_payment($paymentid, $payeeid, $categoryid, $sum, $updatedBy);
    
    if ($result) {
      $title = 'Success';
      $message = 'Payment sucessfully updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      $title = 'Error';
      $message = 'Payment failed to be updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'errors/error.php';
    }
    
  } else {
    $title = 'Edit Payment';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payments/edit_payment.php';  
  } 

} else if ($command[0] == 'c_delete_payment') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Delete Payment';
  $payment = get_payment_details($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/payments/delete_payment.php';  
  
} else if ($command[0] == 'delete_payment') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Deletion Confirmed';
  $message = 'Payment sucessfully removed from the database.';
  $payment = delete_payment($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';

} else if ($command[0] == 'users') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $title = 'Users';
  $users = get_users();
  
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/index.php'; 
  
} else if ($command[0] == 'add_user') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  if ( $_POST ){
    
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rights = $_POST['rights'];
    $createdBy = $_SESSION['user']['user_id'];
    
    $result = add_user($username, $fname, $lname, $email, $password, $rights, $createdBy);
    if ($result) {
      $title = 'Sucess';
      $message = 'User sucessfully added to database';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      echo "An Error has occured.";
    }
     
  } else {
    $title = 'Add User';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/add_user.php';
  }
  
} else if ($command[0] == 'edit_user') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
  $user = get_user($command[1]);
  if ( $_POST ){
    
    $userid = $command[1];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rights = $_POST['rights'];
    $updatedBy = $_SESSION['user']['user_id'];
    
    $result = update_user($userid, $username, $fname, $lname, $email, $password, $rights, $updatedBy);
    if ($result) {
      $title = 'Sucess';
      $message = 'User sucessfully updated.';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
      include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';
    } else {
      echo "An Error has occured.";
    }
     
  } else {
    $title = 'Edit User';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
    include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/edit_user.php';
  } 
 
} else if ($command[0] == 'c_delete_user') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Delete User';
  $user = get_user($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/users/delete_user.php';  
  
} else if ($command[0] == 'delete_user') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }  
  $title = 'Deletion Confirmed';
  $message = 'User sucessfully removed from the database.';
  $user = delete_user($command[1]);
  include $_SERVER['DOCUMENT_ROOT'].$dir.'modules/header.php';
  include $_SERVER['DOCUMENT_ROOT'].$dir.'views/success.php';   
  
} else if ($command[0] == '') {
  if ( !$_SESSION['user'] ) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].$dir.'login');
  }
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
