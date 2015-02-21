<?php

require $_SERVER['DOCUMENT_ROOT'].'/cit313/budget_app/connection/conn_budget.php';
require $_SERVER['DOCUMENT_ROOT'].'/cit313/budget_app/control/crypto.php';

function get_users() {
	global $db;

  try {
    $sql = "SELECT * FROM system_users";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();    
  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_user($userid) {
  global $db;

  try {
    
    $sql = "SELECT * 
            FROM system_users
            WHERE user_id = :userid";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_user_by_username($username) {
  global $db;

  try {
    
    $sql = "SELECT * 
            FROM system_users
            WHERE username = :username";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_categories() {
	global $db;

  try {
    $sql = "SELECT * FROM categories";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();    
  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_category($categoryid) {
  global $db;

  try {
    
    $sql = "SELECT * 
            FROM categories
            WHERE category_id = :categoryid";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_category_totals() {
  global $db;

  try {
    
    $sql = "SELECT c.category_id, c.name, SUM(p.sum) AS total
            FROM payments p RIGHT JOIN categories c
            ON p.category_id = c.category_id
            GROUP BY c.name";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payees() {
	global $db;

  try {
    $sql = "SELECT * FROM payees";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();    
  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payee($payeeid) {
  global $db;

  try {
    
    $sql = "SELECT * 
            FROM payees
            WHERE payee_id = :payeeid";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':payeeid', $payeeid, PDO::PARAM_INT);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payee_totals() {
  global $db;

  try {
    
    $sql = "SELECT pe.payee_id, pe.name, SUM(pt.sum) AS total 
            FROM payments pt RIGHT JOIN payees pe
            ON pt.payee_id = pe.payee_id
            GROUP BY pe.name";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payments() {
	global $db;

  try {
    $sql = "SELECT pt.payment_id, p.name AS pName, c.name AS cName, pt.sum
            FROM payees p INNER JOIN payments pt
            ON p.payee_id = pt.payee_id INNER JOIN categories c
            ON c.category_id = pt.category_id;";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();    
  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payment($paymentid) {
  global $db;

  try {
    
    $sql = "SELECT * 
            FROM payments
            WHERE payment_id = :paymentid";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':paymentid', $paymentid, PDO::PARAM_INT);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}

function get_payment_details($paymentid) {
  global $db;

  try {
    
    $sql = "SELECT pt.payment_id, p.name AS pName, c.name AS cName, pt.sum
            FROM payees p INNER JOIN payments pt
            ON p.payee_id = pt.payee_id INNER JOIN categories c
            ON c.category_id = pt.category_id
            WHERE payment_id = :paymentid";
			  
	  $stmt = $db->prepare($sql);
	  $stmt->bindValue(':paymentid', $paymentid, PDO::PARAM_INT);
	  $stmt->execute();
	  $results = $stmt->fetch(PDO::FETCH_ASSOC);
	  $stmt->closeCursor();  
			  
  } catch (Exception $ex) {
    header('Location: ./error/500.php');
    exit;
  }
  
  if ( !empty($results) ){
    return $results;
  } else {
    return FALSE;
  }
}


function add_user($username, $firstname, $lastname, $email, $plain_password, $rights, $createdBy) {
  global $db;
	
  $password = create_hash($plain_password);
  
	try {
    $sql = "INSERT INTO system_users VALUES ( null, :username, :lastname, :firstname, :email, :password, :rights, :createdBy, UTC_DATE(), :createdBy, UTC_DATE())";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR); 
    $stmt->bindValue(':rights', $rights, PDO::PARAM_INT);
    $stmt->bindValue(':createdBy', $createdBy, PDO::PARAM_INT);
     
    $stmt->execute();
    $stmt->closeCursor(); 
    
    $count = $db->lastInsertId();
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function add_category($name, $createdBy) {
  global $db;
  
	try {
    $sql = "INSERT INTO categories VALUES ( null, :name, :createdBy, UTC_DATE(), :createdBy, UTC_DATE())";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':createdBy', $createdBy, PDO::PARAM_INT);
     
    $stmt->execute();
    $stmt->closeCursor(); 
    
    $count = $db->lastInsertId();
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function add_payee($name, $createdBy) {
  global $db;
  
	try {
    $sql = "INSERT INTO payees VALUES ( null, :name, :createdBy, UTC_DATE(), :createdBy, UTC_DATE())";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':createdBy', $createdBy, PDO::PARAM_INT);
     
    $stmt->execute();
    $stmt->closeCursor(); 
    
    $count = $db->lastInsertId();
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function add_payment($payeeid, $categoryid, $sum, $createdBy) {
  global $db;
  
	try {
    $sql = "INSERT INTO payments VALUES ( null, :payeeid, :categoryid, :sum, :createdBy, UTC_DATE(), :createdBy, UTC_DATE())";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':payeeid', $payeeid, PDO::PARAM_INT);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':sum', $sum, PDO::PARAM_INT);
    $stmt->bindValue(':createdBy', $createdBy, PDO::PARAM_INT);
     
    $stmt->execute();
    $stmt->closeCursor(); 
    
    $count = $db->lastInsertId();
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function delete_user($userid) {
  global $d3m3trios;
	global $db;
	
	try {
		$sql = "DELETE FROM system_users
           WHERE user_id = :userid";
		
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
    
    $stmt->execute();
    $count = $stmt->rowCount();
    $stmt->closeCursor();	
    
	} catch (PDOExeption $e) {
		$count = 0;	
	}
	if ($count >= 1) {
		return $count;	
	} else {
		return 0;
	}
}

function delete_category($categoryid) {
  global $d3m3trios;
	global $db;
	
	try {
		$sql = "DELETE FROM categories
           WHERE category_id = :categoryid";
		
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    
    $stmt->execute();
    $count = $stmt->rowCount();
    $stmt->closeCursor();	
    
	} catch (PDOExeption $e) {
		$count = 0;	
	}
	if ($count >= 1) {
		return $count;	
	} else {
		return 0;
	}
}

function delete_payee($payeeid) {
  global $d3m3trios;
	global $db;
	
	try {
		$sql = "DELETE FROM payees
           WHERE payee_id = :payeeid";
		
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':payeeid', $payeeid, PDO::PARAM_INT);
    
    $stmt->execute();
    $count = $stmt->rowCount();
    $stmt->closeCursor();	
    
	} catch (PDOExeption $e) {
		$count = 0;	
	}
	if ($count >= 1) {
		return $count;	
	} else {
		return 0;
	}
}

function delete_payment($paymentid) {
  global $d3m3trios;
	global $db;
	
	try {
		$sql = "DELETE FROM payments
           WHERE payment_id = :paymentid";
		
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':paymentid', $paymentid, PDO::PARAM_INT);
    
    $stmt->execute();
    $count = $stmt->rowCount();
    $stmt->closeCursor();	
    
	} catch (PDOExeption $e) {
		$count = 0;	
	}
	if ($count >= 1) {
		return $count;	
	} else {
		return 0;
	}
}

function update_user($userid, $username, $firstname, $lastname, $email, $plain_password, $rights, $updatedBy) {
  global $db;
	
  $password = create_hash($plain_password);
  
	try {
    $sql = "UPDATE system_users SET 
            username=:username, 
            last_name=:lastname, 
            first_name=:firstname, 
            email=:email, 
            password=:password, 
            rights=:rights, 
            last_updated_by=:updatedBy, 
            last_update_date=UTC_DATE()
            WHERE user_id=:userid";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR); 
    $stmt->bindValue(':rights', $rights, PDO::PARAM_INT);
    $stmt->bindValue(':updatedBy', $updatedBy, PDO::PARAM_INT);
     
    $stmt->execute();
    $count = $stmt->rowCount();
    
    $stmt->closeCursor(); 

  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function update_category($categoryid, $name, $updatedBy) {
  global $db;
  
	try {
    $sql = "UPDATE categories SET 
           name = :name, 
           last_updated_by = :updatedBy, 
           last_update_date = UTC_DATE()
           WHERE category_id = :categoryid";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':updatedBy', $updatedBy, PDO::PARAM_INT);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
     
    $stmt->execute();
    $count = $stmt->rowCount();
    
    $stmt->closeCursor(); 
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

function update_payee($payeeid, $name, $updatedBy) {
  global $db;
  
	try {
    $sql = "UPDATE payees SET 
           name = :name, 
           last_updated_by = :updatedBy, 
           last_update_date = UTC_DATE()
           WHERE payee_id = :payeeid";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':updatedBy', $updatedBy, PDO::PARAM_INT);
    $stmt->bindValue(':payeeid', $payeeid, PDO::PARAM_INT);
     
    $stmt->execute();
    $count = $stmt->rowCount();
    
    $stmt->closeCursor(); 
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}
function update_payment($paymentid, $payeeid, $categoryid, $sum, $updatedBy) {
  global $db;
  
	try {
    $sql = "UPDATE payments SET
           payee_id = :payeeid, 
           category_id = :categoryid, 
           sum = :sum, 
           last_updated_by = :updatedBy,
           last_update_date = UTC_DATE()
           WHERE payment_id = :paymentid";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':payeeid', $payeeid, PDO::PARAM_INT);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':sum', $sum, PDO::PARAM_INT);
    $stmt->bindValue(':updatedBy', $updatedBy, PDO::PARAM_INT);
    $stmt->bindValue(':paymentid', $paymentid, PDO::PARAM_INT);
    
     
    $stmt->execute();
    $count = $stmt->rowCount();
    
    $stmt->closeCursor(); 
    
  } catch (PDOException $e) {
    $count = 0;
  }
  
  if ($count >= 1) {
		return 1;	
	} else {
		return 0;
	}
}

?>