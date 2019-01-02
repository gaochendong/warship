<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | ship</title>
</head>
<body>
  <?php session_start();?>

  <?php        
    require_once  '../../inc/db.php';    
    require_once  '../../inc/common.php'; 
    $query = $db->prepare('select * from artillery where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->name; ?>  </h1>
  <h2>弹药：<?php echo $post->弹药; ?></h2>
  <h2>适用舰种：<?php echo $post->适用舰种; ?></h2>
  <h2>射速：<?php echo $post->射速; ?></h2>
  <h2>特性：<?php echo $post->特性; ?></h2>
  <h2>射角：<?php echo $post->射角; ?></h2>



</body>
</html>