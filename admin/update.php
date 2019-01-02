<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$id = $_POST['id'];
$sql = "update posts set title = :title,nation =:nation,equip = :equip,perfor = :perfor,size = :size,body = :body where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindValue(':nation',$_POST['nation'],PDO::PARAM_STR);
$query->bindValue(':equip',$_POST['equip'],PDO::PARAM_STR);
$query->bindValue(':perfor',$_POST['perfor'],PDO::PARAM_STR);
$query->bindValue(':size',$_POST['size'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("show.php?id={$id}");
};
?>