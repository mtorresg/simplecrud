<?php
require_once 'init.php';

$errors = array( 'name'=>'','lastname' => '', 'email' => '');

if(isset($_POST['name'],$_POST['lastname'],$_POST['email'])){
 if(!empty($_POST['name'])&&!empty($_POST['lastname'])&&!empty($_POST['email'])){
  
   
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
           
  $stmt = $db->prepare('INSERT INTO users(name, lastname, email) VALUES(?,?,?)');
  
   //VALIDATIONS
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = ' Invalid email';
  } else {
    $errors['email'] = '';
  }
     
  if(preg_match_all('/[0-9\*\@]/',$name)){
    $errors['name'] = ' Invalid name only letters allowed';
  } else {
    $errors['name'] = '';
  }
   
   if(preg_match('/[0-9\*\@]/',$lastname)){
    $errors['lastname'] = ' Invalid last name only letters allowed';
   } else {
     $errors['lastname'] = '';     
   }
  
  if($errors['name'] === '' && $errors['lastname'] === '' && $errors['email'] === ''){
    $stmt->execute(array($name, $lastname, $email));
    echo 'Added';
  }  
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
  <input type="text" name="name"/><span><?php echo $errors['name'];?></span><br/>
  
  <label for="name">Last Name</label>
  <input type="text" name="lastname"/><span><?php echo $errors['lastname'];?></span><br/>
  
  <label for="email">Email</label>
  <input type="email" name='email'/><span><?php echo $errors['email'];?></span><br/>
  
  <input type="submit" name="submit" value="Accept">
  </form><br/><br/>
  <a href="index.php">Back</a>    
</body>
</html>