<?php
require_once 'init.php';

if(empty($_GET['id'])){
  header('Location: index.php');
}
  if(isset($_GET['id'])){
  $stmt = $db->prepare('DELETE FROM users WHERE id=?');
  $stmt->execute(array($_GET['id']));
  echo 'Successfuly deleted';  
}
echo '<br/><br/>';
echo '<a href="index.php">Back</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete</title>
</head>
<body>  
</body>
</html>
