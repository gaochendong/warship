<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>new | 舰船</title>
</head>
<body>
<h1>New post</h1>

<div style="border: 1px solid red;">
<?php if(isset($_SESSION['info'])){
	echo '错误：' . $_SESSION['info'];
//	unset($_SESSION['info']);
}
?>
</div>

<form action="save.php" method="post" enctype="multipart/form-data">
	
	<label for="title">title</label>
	<input type="text" name="title" value="" />
	<br/>
	<label for ="pic">pic</label>
	<input type="file" name="pic">
	<br/>
	<label for="catalog">分类</label>
	<select name="catalog">
	<?php
        require_once '../inc/db.php';    
        require_once '../inc/common.php';  

        $query = $db->query('select * from catelogries');
       
        while( $catalog = $query->fetchObject() ) {    
    ?>

		<option value="<?php echo $catalog->id ?>"><?php echo $catalog->name ?></option>
		
    <?php } ?>
    </select>

	<br/>
	<label for="body">body</label>
	<textarea name="body"></textarea>
	<br/>
	<label for="nation">nation</label>
	<textarea name="nation"></textarea>
	<br/>
	<label for="equip">equip</label>
	<textarea name="equip"></textarea>
	<br/>
	<label for="perfor">perfor</label>
	<textarea name="perfor"></textarea>
	<br/>
	<label for="size">size</label>
	<textarea name="size"></textarea>
	<br/>		
	<input type="submit" value="提交" />
</form>

</body>
</html>