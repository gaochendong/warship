<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>首页 - warship</title>
  <style>
    body {
      background-image: url("../uploads/0001.jpg")
    }
    /*将 thead 元素中的 th元素的背景色设置为 grey */
    /*将 tbody 元素中的 th元素的背景色设置为 lightgrey */
    thead th{
      background: grey;
      color: white;
    }
    tbody th{
      background: lightgrey;
      color: white;
    }
    th,td {
      border: 1px solid black;
      padding: 5px;
    }
    caption {
      padding: 10px;
    }
    img{
      position: absolute;
      left: 53%;
      margin-left: -181px;
    }
  </style>
</head>

<body>

  <?php session_start(); 
    require_once '../inc/db.php';    
    require_once '../inc/common.php'; 
  ?>
  <?php echo "欢迎 {$_SESSION['uid']}!"; ?>
  <?php echo display_error(); ?>

  <ul>
    <li><a href="./" title="">ALL</a>
    <?php
        require_once '../inc/db.php';    
        require_once '../inc/common.php';  

        $query = $db->query('select * from catelogries');
       
        while( $catalog = $query->fetchObject() ) {    
    ?>

    <li><a href="?catalog_id=<?php echo $catalog->id ?>" title=""><?php echo $catalog->name ?></a></li>
    
    <?php } ?>
  </ul>  
 

  <table border=1; align=center>
    <caption><h1>warship</h1></caption>
    <thead>
      <tr>
        <th>id</th>
        <th>标题</th>
        <th>nation</th>
        <th>catalog</th>
        <th>story</th>
        <th>操作</th>
                
      </tr>
    </thead>
    <tbody>


      <?php
        require_once '../inc/db.php';    
        require_once '../inc/common.php';  

        $query = $db->query('select * from posts');
       
        while($post = $query->fetchObject() ) {    
      ?>
      
      <?php
        require_once '../inc/db.php';
        require_once '../inc/common.php';
        if (isset($_GET['catalog_id'])) {
          $filter = "where catalog_id ='{$_GET['catalog_id']}'";
        }else{
          $filter = "" ;
        }

        $query = $db->query("select * from posts {$filter}");
        while ( $post =  $query->fetchObject() ) {
          
      ?>
      <?php
       // session_start();
        require_once '../inc/db.php';
        require_once '../inc/common.php';
        if(!is_login()){
         // set_error("你没有权限访问")；
          redirect_to('../sessions/new.php');
        }
      
        $query = $db->query('select * from posts');
        while ( $post =  $query->fetchObject() ) {
          
      ?>
          <tr>
            <td><?php echo $post->id; ?></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->nation; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->catalog; ?></a></td>
            <td><a href="../story/story-1.php">story</a></td>


            <td> 
              <a href="edit.php?id=<?php echo $post->id; ?>">改</a> 
              <a href="delete.php?id=<?php echo $post->id; ?>">删</a> 
            </td>        
          </tr> 

     <?php  } ?>
     <?php  } ?>
     <?php  } ?>
    </tbody>
    </table>
  <a href="new.php">新增</a>
  <a href="../story/index2.php ?>">首页</a>
</body>
</html>