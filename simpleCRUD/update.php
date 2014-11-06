<?php

require_once 'init.php';
$errors = array( 'name'=>'','lastname' => '', 'email' => '');

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
    
  
  if(($_SERVER['REQUEST_METHOD'] == "POST")) 
    if($errors['name'] === '' && $errors['lastname'] === '' && $errors['email'] === ''){
    if($stmt->execute(array($name, $lastname, $email, $id))){
      echo '<br/>', 'Updated' , '<br/>';
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
</head>
<body>
<?php try { ?>
 <form action="update.php" method="post">
  <div class="container">
    <input type="text" name="id" value="<?php echo $id; ?>" READONLY hidden/><br/>   
    <label for="name">Name</label> 
    <input type="text" name="name" value="<?php echo $name; ?>"/><span><?php echo $errors['name'];?></span><br/>
    <label for="lastname">Lastname</label>    
    <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><span><?php echo $errors['lastname'];?></span><br/>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $email;?>"/><?php echo $errors['email'];?><br/>    
    <input type="submit" value="Ok"><br/><br/>
    <a href="index.php">Back</a>    
  </div>      
  </form>
  <?php }catch(Exception $e){ ?>
  <?php header('Location: index.php'); ?>
  <?php } ?>  
</body>
</html>