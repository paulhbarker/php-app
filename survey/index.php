<?php
session_start();

if (isset($_SESSION['complete'])) {
  $data = getData();
  include 'results.php';
  exit;
}

if (isset($_POST['action'])) {
  $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
  $action = $_GET['action'];
}

if ($action == 'Submit'){
  $database = file_get_contents('database.txt');
  if ($database) {
    $data = unserialize($database);
    foreach($_POST as $answer){
      if (array_key_exists($answer, $data)) {
        $data[$answer]++; 
      } else {
        $data[$answer] = 1; 
      }
    }
    file_put_contents('database.txt', serialize($data));
  } else {
    $data = array();
    foreach($_POST as $answer) {
      $data[$answer] = 1;
    }
    file_put_contents('database.txt', serialize($data));
  }
  $_SESSION['complete'] = TRUE;
  include 'results.php';
} else if ($action == 'results') {
  $data = getData();
  include 'results.php';
} else {
  include 'survey.php';
}

function getData() {
  $database = file_get_contents('database.txt');
  if ($database) {
    return unserialize($database);
  } else {
    return array(); 
  }
}

function printTotal($key, $array) {
  if (array_key_exists($key, $array)){
    echo $array[$key]; 
  } else {
    echo "0"; 
  }
}
?>