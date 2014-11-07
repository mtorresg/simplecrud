<?php
require_once 'init.php';

$errors = array( 'name'=>'','lastname' => '', 'email' => '');
$name = '';
$lastname = '';
$email = '';

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
   //END OF VALIDATIONS
   
  if($errors['name'] === '' && $errors['lastname'] === '' && $errors['email'] === ''){    
    $stmt->execute(array($name, $lastname, $email));
    $name = '';
    $lastname = '';
    $email = '';
    
    echo '<p class="text-success">', 'User added', '</p>'; 
  }
   
 } else {
   echo '<p class="text-danger">', 'All fields are required', '</p>';   
   $name = $_POST['name'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">  
</head>
  <body>
   <form action="add.php"  method="post" role="form">
     <div class="form-group col-xs-4">
       <label for="name">Name</label>  
       <input type="text" class="form-control" name="name" value="<?php echo $name?>"/>
       <span class="text-danger"><?php echo $errors['name'];?></span><br/>

       <label for="name">Last Name</label>
       <input type="text" class="form-control" name="lastname" value="<?php echo $lastname?>"/>
       <span class="text-danger"><?php echo $errors['lastname'];?></span><br/>

       <label for="email">Email</label>
       <input type="email" class="form-control" name='email' value="<?php echo $email?>" />
       <span class="text-danger"><?php echo $errors['email'];?></span><br/><br/> 

       <input type="submit" class="btn btn-primary btn-md active" name="submit" value="Accept">
       <a href="index.php" class="btn btn-default btn-md active">Back</a>
     </div>
    </form>
  </body>
</html>