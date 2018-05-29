<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>JList</title>
</head>
<body>

<?php
session_unset(); 

session_destroy();
header('Location: index.php');
?>

</body>
</html>