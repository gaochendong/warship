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
    }
    caption {
      padding: 10px;
    }
    img{
      position: absolute;
      left: 54%;
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

  ?>




  <table border=1; align=center>
    <caption><h1>warship</h1></caption>
    <thead>
      <tr>
        <th>id</th>
        <th>type</th>
        <th>body</th>


        
                
      </tr>
    </thead>
    <tbody>
      <?php
        require_once '../inc/db.php';    
        require_once '../inc/common.php';  

        $query = $db->query('select * from introduction');
       
        while($post = $query->fetchObject() ) {    
      ?>
      


          <tr>
            <td><?php echo $post->id; ?></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->type; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>">介绍</a></td>

        
          </tr> 

     <?php  } ?>
    </tbody>
    </table>


    <img alt="warship-LOGO" src="../uploads/t-1.jpg" width="256px" height="256px">
    <a href="../story/index2.php ?>">首页</a>

</body>
</html>