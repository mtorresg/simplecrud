<?php 

require_once 'init.php';

$stmt = $db->query('SELECT id, name, lastname, email FROM  users');

while($row = $stmt->fetchObject()){
  $users[] = $row;    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
  <body>   
  <?php if(empty($users)): ?> 
  <?php echo '<p class="text-warning">','No users','</p>'; ?>
  <?php echo  '<br/><a href="add.php" class="btn btn-primary btn-md active">Create new</a>'?>
  <?php else: ?> 
   
    <table class="table">
      <tr>      
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>  
      <tr>    
      <?php foreach($users as $user):?>  
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->lastname ?> </td>   
        <td><?php echo $user->email ?></td>        
        <td><a href="update.php?id=<?php echo $user->id;?>&name=<?php echo $user->name;?>&lastname=<?php echo $user->lastname;?>&email=<?php echo $user->email;?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $user->id;?>" >Delete</a></td>            
        </tr>    
    <?php endforeach;?>    
    </table><br/><br/>      
    <a href="add.php" class="btn btn-primary btn-md active">Create new</a>
    
  <?php endif; ?>

  </body>
</html>