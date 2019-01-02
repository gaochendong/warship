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
  echo "欢迎{$_SESSION['uid']}!"; 
  ?>
  <?php        
    require_once  '../inc/db.php';    
    require_once  '../inc/common.php';  
    $query = $db->prepare('select * from posts where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->title; ?>  </h1>
  
  <img src="<?php echo $post->pic; ?>" alt="for pic">
  </br>
  分类：<?php echo $post->catalog; ?>
  <p><?php echo $post->body; ?></p>
  equip:<p><?php echo $post->equip; ?></p>
  perfor:<p><?php echo $post->perfor; ?></p>
  size:<p><?php echo $post->size; ?></p>
  <h2>评论列表</h2>
  <form action='../comment/save.php' method="post">
    <input type="hidden" name="post_id" value='<?php echo $_GET['id']; ?>'/>
    <label for="title">标题</label>
    <input type="text" name="title">
    <br/>
    <label for="body">正文</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
  </form>

  <ol>
  <?php
    require_once '../inc/db.php'; 
    require_once '../inc/common.php';  

    $query = $db->query('select * from comments');
    while ( $comment =  $query->fetchObject() ) {

      ?>
          <li>
            
            <h4><?php echo $comment->title; ?></h4>
            <p><?php echo $comment->body; ?></p> 

          </li> 
 
    <?php  } ?>

</body>
</html>