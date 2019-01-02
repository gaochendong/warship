<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | ship</title>
</head>
<body>
  <?php session_start();?>
  <?php
  require_once  '../inc/db.php';    
  require_once  '../inc/common.php'; 

  ?>
  <?php        
    require_once  '../inc/db.php';    
    require_once  '../inc/common.php';  
    $query = $db->prepare('select * from introduction where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->type; ?>  </h1>
  <h2><?php echo $post->body; ?></h2>
  
  <img src="<?php echo $post->pic; ?>" alt="for pic">
  </br>


</body>
</html>