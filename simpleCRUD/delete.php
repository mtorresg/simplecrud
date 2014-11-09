<?php
require_once 'init.php';

  if(empty($_GET['id'])){
    header('Location: index.php');
  }

  if(isset($_GET['id'])){
    $stmt = $db->prepare('DELETE FROM users WHERE id=?');
    $stmt->execute(array($_GET['id']));    
    header('Location: index.php');
  }
?>
