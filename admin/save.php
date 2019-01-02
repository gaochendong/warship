<?php 
session_start();
require_once  '../inc/db.php';
require_once  '../inc/common.php';
//$_SERVER["DOCUMENT_ROOT"] .

$dest_path = "../uploads/post-" . rand() .".jpg";
$dest = $dest_path ;
var_export($dest);
move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);

if(empty($_POST["title"])){
	$_SESSION['info']='title cannot blank';
	//redirect_to("./")；
	exit();
}

$sql = "insert into posts(title,pic,catalog,body,nation,equip,perfor,size) values(:title,:pic,:catalog,:body,:nation,:equip,:perfor,:size);" ;	
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':pic',$dest_path,PDO::PARAM_STR);
$query->bindParam(':catalog',$_POST['catalog'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':nation',$_POST['nation'],PDO::PARAM_STR);
$query->bindParam(':equip',$_POST['equip'],PDO::PARAM_STR);
$query->bindParam(':perfor',$_POST['perfor'],PDO::PARAM_STR);
$query->bindParam(':size',$_POST['size'],PDO::PARAM_STR);

//$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
//$created_at = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>


