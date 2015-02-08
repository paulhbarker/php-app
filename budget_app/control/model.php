<?php

require $_SERVER['DOCUMENT_ROOT'].'/cit313/budget_app/connection/conn_budget.php';

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
            FROM payments p INNER JOIN categories c
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
            FROM payments pt INNER JOIN payees pe
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

?>