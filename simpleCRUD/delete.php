<?php

require_once 'init.php';

if(empty($_GET['id'])){
  header('Location: index.php');
}
  if(isset($_GET['id'])){
  $stmt = $db->prepare('DELETE FROM users WHERE id=?');
  $stmt->execute(array($_GET['id']));
  echo '<p class="text-success">','Successfuly deleted','</p>';  
}
echo '<br/><br/>';
echo '<a href="index.php" class="btn btn-default btn-md active">Back</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8">
  <title>Delete</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>  
</body>
</html>