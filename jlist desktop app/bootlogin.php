<?php
session_start();
include 'config.php';
  $error = '';

if (isset($_POST['submit'])) {
$email = $conn->escape_string($_POST['email']);

            $find = mysqli_query($conn,"select * from users where email = '" .$email. "'") or die (mysqli_error());
              if (mysqli_num_rows($find))
              {
                $password = $conn->escape_string($_POST['password']);
                $h_pass = md5($password);
                $hash_pass = substr($h_pass, 0, 25);
                $find1 = mysqli_query($conn,"select * from users where email = '" .$email. "' and password = '" .$hash_pass. "'") or die (mysqli_error());
                
                $numrows = mysqli_num_rows($find1);
                if ($numrows ==1) {
                  while ($get = mysqli_fetch_array($find1)) {
                    $user_id = $get['user_id'];
                    $_SESSION["user_id"] = $user_id;
                  }
                header("Location:bootwelcome.php");
                }
                else{
                $error = $hash_pass;
                }
              }

            else
            {
                $error = "Invalid Email";
            }
          }     
$conn->close();
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
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <nav class="navbar navbar-inverse">    
    <ul class="nav navbar-nav navbar-left">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="bootregister.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
     </ul>
</nav>

<div class="container-fluid"> 
<div class="row content text-center">
    <div class="col-sm-12">
    <img src="Logo.jpg" class="img-rounded" alt="Logo" width="500" height="100">
    </div>
</div>
   <div class="row content text-center">
    <div class="col-sm-12">
    </div>
</div>
  <div class="row content">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
      <img src="Favicon.jpg" class="img-rounded" alt="Favicon" width="200" height="200">
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4"> 
     <div class="well">
      <form method="post" action="">
  <div class="form-group">
  <p class="p1"><?php echo $error;?> </p>
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
    <button type="submit" class="btn btn-default" name="submit">Login</button>
</form>
</div>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>

</body>
</html>
