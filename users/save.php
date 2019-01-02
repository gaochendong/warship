<?php 
require_once  '../inc/db.php';
require_once  '../inc/common.php';
require_once  '../inc/session.php';

//$_SERVER["DOCUMENT_ROOT"] .

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = "insert into users(name,password) values(:name,:password);" ;	
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam(':password',$hash,PDO::PARAM_STR);

//$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
//$created_at = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../");
};
?>


