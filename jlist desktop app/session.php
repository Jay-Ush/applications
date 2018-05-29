<?php
include 'config.php';
session_start();
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
?>
	<script>
	window.location = "bootindex.php";
	</script>
<?php
}

$id = $_SESSION['user_id'];
$qry = $conn->query("SELECT * FROM users WHERE user_id = '$id' ");  
$qry1 = $conn->query("SELECT * FROM todo_list WHERE user_id = '$id' ");

$row = mysqli_fetch_array($qry);
$row1 = mysqli_fetch_array($qry1);

$user_id = $row['user_id'];
$lname = $row['last_name'];
$fname = $row['first_name'];
$email = $row['email'];
$date_of_task = $row1['date_of_task'];
?>