<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> | Budget Application</title>
  <link rel="stylesheet" type="text/css" media='screen' href="http://www.<?php echo $_SERVER['HTTP_HOST'].$dir?>../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" media='screen' href="http://www.<?php echo $_SERVER['HTTP_HOST'].$dir?>../css/budget_app.css">
</head>
<body>
	<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $dir ?>">Budget</a>
      </div>
      <div class='navbar-collapse collapse'>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo $dir ?>payments">Payments</a></li>
          <li><a href="<?php echo $dir ?>categories">Categories</a></li>
          <li><a href="<?php echo $dir ?>payees">Payees</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
            if ($_SESSION['user']['rights'] == 1){
              echo "<li><a href='".$dir."users'>Users</a></li>";
            }
          ?>
          <li><a href="#">Logout</a></li>
        </ul>
      </div>
    </div> 
  </div> 