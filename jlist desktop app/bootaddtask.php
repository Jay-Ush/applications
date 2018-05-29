<?php
include  'config.php';
include  'session.php';

$failed="";
$error= "";
$date_of_task="";
$task_name="";
$task_description="";
$task_priority="";
$task_deadline="";
// if form submitted
// process form input
if (isset($_POST['submit'])) {

    // retrieve and check input values
 	$date_of_task = $conn->escape_string($_POST['date_of_task']);
	$task_name = $conn->escape_string($_POST['task_name']);
	$task_description = $conn->escape_string($_POST['task_description']);
	$priority_id =  $conn->escape_string($_POST['priority_id']);
	$task_deadline =  $conn->escape_string($_POST['task_deadline']);
    $user_id = $conn->escape_string($_POST['user_id']);
						
			
				$find = $conn->query("SELECT * FROM todo_list WHERE task_name = '$task_name' ");
                $cnt = mysqli_num_rows($find);
			        if ($cnt == 1)
						{
							$error = "Sorry. There's already a task bearing that name";
						}

					else
					{
								
						// add values to database using INSERT query
						$query = $conn->query("INSERT INTO todo_list (user_id, date_of_task, task_name, task_description, priority_id, task_deadline) 
						VALUES ('$user_id', '$date_of_task', '$task_name', '$task_description', '$priority_id', '$task_deadline') ");
						if ($query) 
						{
						    $failed="New Task Added Successfully";
						} 
						else 
						{
						    $failed="Operation Failed";
				
						}

					}

}			
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
  <link rel="stylesheet" type="text/css" href="style.css">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid1">
    <div class="navbar-brand">
      <strong>
        <a href="bootwelcome.php"><span class="glyphicon glyphicon-file"></span> JLIST</a>
      </strong>
      
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="bootaddtask.php"><span class="glyphicon glyphicon-plus-sign"></span> Add New Task</a></li>
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

<div class="page-header">
  <h1><span class="glyphicon glyphicon-plus-sign"></span> Add New Task to To-Do List</h1>
</div>
<div class="row content">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6"> 
     <div class="well well-lg">
      <form method="post" action="">
      <p class="p1"><?php echo $failed; echo $error ?> </p>
      <div class="form-group">
    <label for="date_of_task">Date of Task:</label>
    <input type="date" class="form-control" name="date_of_task" required>
  </div>
  <div class="form-group">
    <label for="task_name">Task Name:</label>
    <input type="text" class="form-control" name="task_name" required>
  </div>
  <div class="form-group">
    <label for="task_description">Task Description:</label>
   <textarea class="form-control" rows="5" name="task_description"></textarea>
</div>
<div class="form-group">
    <label for="priority_id">Priority id:</label>
    <select class="form-control" name="priority_id" required>
    <option>1</option>
    <option>2</option>
    <option>3</option>
   </select>
   <span class="help-block">Note: Priority 1 = Highest. Priority 2 = Medium. Priority 3 = Lowest.</span>
  </div>
  <div class="form-group">
    <label for="task_deadline">Task Deadline:</label>
    <input type="time" class="form-control" name="task_deadline" required>
  </div>

   <input type=" text" name="user_id" value="<?php echo $user_id; ?>" hidden>

    <button type="submit" class="btn btn-default" name="submit">Add</button>
  </form>
  </div>


</div>
    </div>
    <div class="col-sm-3">
    
    </div>
  </div>
</body>
</html>