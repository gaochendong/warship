<?php
//require 'kint.phar';

//
//require 'ChromePhp.php';

function redirect_to($dest="/"){
	if (headers_sent()){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $dest"); 
    }else{
    header("Refresh: 0; URL=$dest");
    }
    esit();
}

function redirect_back(){
	$dest = $_SERVER['HTTP_REFERER'];
	$dest = $dest ? $dest : '/';
	if (headers_sent()){
		header("Location: $dest");
	}else{
		header("Refresh: 0; URL=$dest");
	}
	exit();
}

function is_login(){
	return isset($_SESSION['uid']);
}
function current_user(){
	if(is_login()){
		return $_SESSION['uid'];
	}
}

function set_error($msg){
	$_SESSION["error"] = $msg;
}

function display_error(){
	$msg = '';
	if(isset($_SESSION['error'])){
		$msg = '<div style="border: 1px solid red;">' . '错误：' . $_SESSION['info'] . '</div>';
	unset($_SESSION['error']);
    }
    return $msg;
}
?>