<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>首页 - warship</title>
  <style>
    body {
      background-image: url("../uploads/t-1.jpg")
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
      background: grey;
      color: white;
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
  <?php 
  session_start();
  require_once '../inc/common.php';  
  require_once '../inc/db.php';
  require_once '../inc/pager.php';
  $querya = pager_query('select * from posts ',$nav_html,$_GET['page']);
  ?>

  <?php echo "欢迎 {$_SESSION['uid']}!"; ?>
  </br>

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
        
                
      </tr>
    </thead>
    <tbody>
      <?php
        require_once '../inc/db.php';    
        require_once '../inc/common.php';  
        require_once '../inc/pager.php';
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

        $queryb = $db->query("select * from posts {$filter}");
        while ( $post =  $queryb->fetchObject() ) {
      ?>  
      <?php
        while ( $post =  $querya->fetchObject() ) {
      ?>  

          <tr>
            <td><?php echo $post->id; ?></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->nation; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->catalog; ?></a></td>
            <td><a href="../story/story-1.php">story</a></td>
        
          </tr> 
     <?php  } ?>
     <?php  } ?>
     <?php  } ?>
    </tbody>
    </table>
    <?php echo $nav_html; ?> 

    <img alt="warship-LOGO" src="../uploads/BZ-2.jpg" width="280px" height="150px">
    <a href="../admin/new.php">新增</a>
    <a href="../admin">管理后台</a>
    <br>
    <a href="../story/index2.php ?>">主界面</a>
    <a href="../sessions/new.php">登陆</a>
    <a href="../sessions/destroy.php">登出</a>
</body>
</html>