<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$sql = "insert into comments(title,body,id) values(:title, :body, :id);" ;  
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
//$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
//$created_at = date('Y-m-d H:i:s');  //CURRENT_TIMESTAMP
if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_back();
};
?>