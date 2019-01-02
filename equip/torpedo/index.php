<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>首页 - warship</title>
  <style>
    body {
      background-image: url("../../uploads/timg.jpg")
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
  </style>
</head>

<body>
  <?php 
  session_start();
  require_once '../../inc/common.php';  
  require_once '../../inc/db.php';


  ?>




  <table border=1; align=center>
    <caption><h1>warship</h1></caption>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>射程</th>
        <th>射角</th>
        <th>弹药</th>
              
      </tr>
    </thead>
    <tbody>
      <?php
        require_once '../../inc/db.php';    
        require_once '../../inc/common.php';  

        $query = $db->query('select * from torpedo');
       
        while($post = $query->fetchObject() ) {    
      ?>
      


          <tr>
            <td><?php echo $post->id; ?></td>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->name; ?></a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>">射程</a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>">射角</a></td>
            <td><a href="show.php?id=<?php print $post->id; ?>">弹药</a></td>


        
          </tr> 

     <?php  } ?>
    </tbody>
    </table>
    <img alt="warship-LOGO" src="../../uploads/yl-1.jpg" width="356px" height="256px">
    <a href="../index3.php ?>">返回上一页</a>
    <a href="../../story/index2.php ?>">首页</a>
</body>
</html>