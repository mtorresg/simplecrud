<?php
require_once 'init.php';

$errors = array( 'name'=>'','lastname' => '', 'email' => '');
$message = '';

try{
  
  $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];      
  $name = isset($_GET['name']) ? $_GET['name'] : $_POST['name'];
  $lastname = isset($_GET['lastname']) ? $_GET['lastname'] : $_POST['lastname'];
  $email = isset($_GET['email']) ? $_GET['email'] : $_POST['email'];  
  $stmt = $db->prepare('UPDATE users SET name=?, lastname=?, email=? WHERE id=?');  
    
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
  
  if(($_SERVER['REQUEST_METHOD'] == "POST")) 
    if(empty($_POST['name'])||empty($_POST['lastname'])||empty($_POST['email'])){
      $message = 'All fields are required';
  } else {
    if($errors['name'] === '' && $errors['lastname'] === '' && $errors['email'] === ''){
      if($stmt->execute(array($name, $lastname, $email, $id))){        
        $message = 'User updated';
      }
    }      
  }
} catch(Exception $e){  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/form.css">
</head>
 <div class="bluebar">Users</div>  
  <body>
    <?php try { ?>
    <form action="update.php" method="post" role="form">     
      <div class="form-group col-xs-4">
        <h3>Edit User</h3>
         <div class="bg-info"><?php echo $message?></div>
          <input type="text" name="id" value="<?php echo $id; ?>" READONLY hidden/><br/>   

          <label for="name">Name</label> 
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"/>
          <span class="text-danger"><?php echo $errors['name'];?></span><br/>

          <label for="lastname">Lastname</label>    
          <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>"/>
          <span class="text-danger"><?php echo $errors['lastname'];?></span><br/>

          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $email;?>"/>
          <span class="text-danger"><?php echo $errors['email'];?> </span><br/><br/>    

          <input class="btn btn-primary btn-md active" type="submit" value="Accept">
          <a href="index.php" class="btn btn-default btn-md active">Back</a>    
       </div>      
    </form>
    <?php }catch(Exception $e){ ?>
    <?php header('Location: index.php'); ?>
    <?php } ?>  
</body>
</html>