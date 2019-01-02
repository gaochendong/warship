<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>edit | 博客 </title>
</head>
<body>
	<?php 
		require_once '../inc/db.php';
		$id = $_GET['id'];
	    $query = $db->prepare('select * from posts where id = :id');
	    $query->bindValue(':id',$id,PDO::PARAM_INT);
	    $query->execute();
	    $post = $query->fetchObject();    		
	?>
	<h1>edit post:</h1>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<label for="title">title</label>
		<input type="text" name="title" value="<?php echo $post->title ?>" />
		<br/>
		<label for="body">body</label>
		<textarea name="body">
			<?php echo $post->body; ?>
		</textarea>
        <br/>
		<label for="nation">nation</label>
		<textarea name="nation">
			<?php echo $post->nation; ?>
		</textarea>
		<br/>
		<label for="equip">equip</label>
		<textarea name="equip">
			<?php echo $post->equip ?>
        </textarea>
		<label for="perfor">perfor</label>
		<textarea name="perfor">
			<?php echo $post->perfor ?>
        </textarea>
		<label for="size">size</label>
		<textarea name="size">
			<?php echo $post->size ?>
        </textarea>        
		<br/>
		<input type="submit" value="提交" />
	</form>
</body>
</html>
