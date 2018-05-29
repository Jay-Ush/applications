<?php
include 'config.php';


  $failed = '';
  $error = '';
// if form submitted
// process form input
if (isset($_POST['submit'])) {

// retrieve and check input values

  $last_name = $conn->escape_string($_POST['last_name']);
  
  $first_name = $conn->escape_string($_POST['first_name']);

  $email = $conn->escape_string($_POST['email']);
  
  $password = $conn->escape_string($_POST['password']);
  $hash_pass = md5($password);

  $c_pass = $conn->escape_string($_POST['c_pass']);
  $hash_c_pass = md5($c_pass);

if($c_pass !== $password)
{
  $failed="Please PROPERLY Confirm Your Password";
}
else
{
            
            $find = mysqli_query($conn,"select * from users where email = '" .$email. "'") or die (mysqli_error());
              if (mysqli_num_rows($find))
            {
              $error = "Sorry. The email you entered already exists";
            }

          else
          {

            // add values to database using INSERT query
            $sql = "INSERT INTO users (last_name, first_name, email, password) VALUES ('$last_name', '$first_name', '$email', '$hash_pass')";
            if ($conn->query($sql) === TRUE) 
            {
                $failed="New Record Created Successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }

            

            
          
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
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

 <nav class="navbar navbar-inverse">    
    <ul class="nav navbar-nav navbar-left">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
     <li><a href="bootlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
      <p class="p1"><?php echo $failed; echo $error ?> </p>
      <div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" name="last_name" required>
  </div>
  <div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" name="first_name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="form-group">
    <label for="c_pass">Confirm Password:</label>
    <input type="password" class="form-control" name="c_pass" required>
  </div>
    <button type="submit" class="btn btn-default" name="submit">Sign Up</button>
</form>
</div>
    </div>
    <div class="col-sm-3">
    </div>
  </div>

</div>
<?php include 'footer.php';?>
</body>
</html>
