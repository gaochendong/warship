<?php session_start() ; ?>
<meta charset="utf-8">
<?php 
require_once  '../inc/db.php';
require_once  '../inc/common.php';
//$_SERVER["DOCUMENT_ROOT"] .

$query = $db->prepare('select * from users where name = :name');
$query->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
$query->execute();
   

$hash = $query->fetchObject()->password;
if (password_verify($_POST["password"],$hash)) {	
	//密码正确，登陆成功
	echo "密码正确，登陆成功";
    $_SESSION["uid"] = $_POST['name'];
	//setcookie("name",$_POST["name"],time()+3600*24);
	//var_export($_COOKIE);
	redirect_to('../story/index2.php');
}else{
	//密码错误，请重新输入
	echo "密码错误，请重新输入";
};



?>