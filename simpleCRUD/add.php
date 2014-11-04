<?php
require_once 'init.php';

if(isset($_POST['name'],$_POST['lastname'],$_POST['email'])){
 if(!empty($_POST['name'])&&!empty($_POST['lastname'])&&!empty($_POST['email'])){
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  
  $stmt = $db->prepare('INSERT INTO users(name, lastname, email) VALUES(?,?,?)');
  
  $stmt->execute(array( $name, $lastname, $email));
   
  echo 'Added';
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User</title>
</head>
<body>

 <form action="add.php" method="post">
 
 <label for="name">Name</label>  
  <input type="text" name="name"/><br/>
  
  <label for="name">Last Name</label>
  <input type="text" name="lastname" /><br/>
  
  <label for="email">Email</label>
  <input type="email" name='email'/><br/>
  
  <input type="submit" name="submit" value="Accept">
  </form><br/><br/>
  <a href="index.php">Back</a>    
</body>
</html>