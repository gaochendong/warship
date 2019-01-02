<?php session_start(); 
  require_once '../inc/db.php';    
  require_once '../inc/common.php'; 
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>new | 舰船</title>
</head>
<body>
<h1>登陆 login</h1>

<?php echo display_error(); ?>


<form action="save.php" method="post" >
  <label for="name">title</label>
	<input type="text" name="name" value="" />
	<br/>
	<label for ="password">password</label>
	<input type="password" name="password" value="" />
	<br/>
    <input type="submit" value="提交" />
</form>

</body>
</html>