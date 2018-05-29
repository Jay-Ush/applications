<?php 
include  'config.php';
include  'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>JList</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" 
      type="image/jpg" 
      href="Favicon.jpg"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-brand">
      <strong>
        <span class="glyphicon glyphicon-file"></span> JLIST
      </strong>
      
    </div>
    <ul class="nav navbar-nav">
        <li><a href="bootaddtask.php"><span class="glyphicon glyphicon-plus-sign"></span> Add New Task</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-search"></span> View Tasks
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="bootviewalltask.php">View All Tasks</a></li>
          <li><a href="bootviewtaskwithdate.php">View Task for a Specific Date</a></li>
          </ul>
      </li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $lname.' '.$fname;?></a></li>
      <li><a href="bootlogout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container-fluid">
  <div class="panel panel-success">
  <div class="panel-heading"><strong>WELCOME</strong></div>
  <div class="panel-body">
   <h1><?php echo $email; ?></h1>
  </div>
</div>
</div>

</body>
</html>
