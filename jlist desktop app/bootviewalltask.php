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
        <li><a href="bootaddtask.php"><span class="glyphicon glyphicon-plus-sign"></span> Add New Task</a></li>
        <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-search"></span> View Tasks
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="active"><a href="bootviewalltask.php">View All Tasks</a></li>
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
  <h1><span class="glyphicon glyphicon-record"></span>   My To-Do List</h1>
</div>
<div class="row content">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
<div id="container" class="panel">    
<?php
$qry = $conn->query("SELECT * FROM todo_list WHERE user_id = '$user_id' ORDER BY priority_id ASC ");

$row = mysqli_num_rows($qry);
if($row == 0){
?>    
<div class="list-group-item1 media">
    <h1>No Record</h1>
</div>  
<?php
}
else{
$myqry = $conn->query("SELECT * FROM todo_list WHERE user_id = '$user_id' ORDER BY priority_id ASC ");

$cntrow = mysqli_num_rows($myqry);

$search = $_SERVER['PHP_SELF'];

$per_page = 5;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($cntrow / $per_page);
if(!$start)
$start=0;

$getquery = $conn->query("SELECT * FROM todo_list WHERE user_id = '$user_id' ORDER BY date_of_task ASC LIMIT $start, $per_page");

?> 
<div class="list-group-item1 media">
<span class="help_block">
<button class="btn btn-danger">Highest priority</button>
<button class="btn btn-success">Medium priority</button>
<button class="btn btn-primary">Lowest priority</button>
</span>

<div class="table-responsive table-striped">         
 <table class="table table-bordered"> 
    <caption>To-Do List [Sorted by Task Date]</caption>   
    <thead>
    <tr> 
         <th>Task Name</th>
         <th>Task Description</th> 
         <th>Task Date</th> 
         <th>Task Deadline</th>   
    </tr> 
    </thead>
<?php    
while($row =mysqli_fetch_array($getquery)){
    $priority = $row['priority_id'];
    ?>
    <tbody>
    
    <?php
    	if($priority == 1)
    		$col = 'danger';
    	if($priority == 2)
    		$col = 'success';
    	if($priority == 3)
    		$col = 'primary';    	
    ?>
    <tr class="btn-<?php echo $col; ?>"> 
         <td><?php echo $row['task_name'];?></td>
         <td><?php echo $row['task_description'];?></td>
         <td><?php echo $row['date_of_task']; ?></td>
         <td><?php echo $row['task_deadline'];?></td>
	</tr>

    </tbody>
<?php
}
?>
</table> 
</div>
</div>



<?php
//Pagination Starts
// Design Here    
echo "<center>";
echo "<div class='panel' style='margin-top:5%;box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);'>"; 
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{  
//previous button
// Design Here    
if (!($start<=0))

echo "<a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$prev'>"."<button class='button btn-sm btn-primary'>
     <span class='glyphicon glyphicon-chevron-left'></span>"."Prev"."</button>"."</a>";    
          
//pages
// Design Here    
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;  
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
else {
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
} 
$i = $i + $per_page;                
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to huser_ide some
{
//close to beginning; only huser_ide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))       
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
else {
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
$i = $i + $per_page;                                      
}
                          
}
//in muser_iddle; huser_ide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=0'>"."<button class='button btn-sm btn-default'>1</button>"."</a>";
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$per_page'>"."<button class='button btn-sm btn-default'>2</button>"."</a> .... ";
 
$i = $start;                
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
else {
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}  
$i = $i + $per_page;               
}
                                  
}
//close to end; only huser_ide early pages
else
{
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=0'>"."<button class='button btn-sm btn-default'>1</button>"."</a>";
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$per_page'>"."<button class='button btn-sm btn-default'>2</button>"."</a> .... ";
 
$i = $start;               
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
else {
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$i'>"."<button class='button btn-sm btn-default'>$counter</button>"."</a>";
}
$i = $i + $per_page;             
}
}
}
          
//next button
// Design Here    
if (!($start >=$cntrow-$per_page))
echo " <a href='bootviewalltask.php?search=$search&submit=Search+source+code&start=$next'>"."<button class='button btn-sm btn-primary'>
     <span class='glyphicon glyphicon-chevron-right'></span>"."Next"."</button>"."</a>";   

}  
echo "</div>";
echo "</center>";

}
?>    
        
    



       
</div>

    </div>
    <div class="col-sm-1">
    
    </div>
</div>

    
    
 <br><br><br><br>     
</div>   
     
</body>
</html>

 