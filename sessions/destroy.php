<?php 
session_start() ;
require_once '../inc/db.php';
require_once '../inc/common.php'; 
unset($_SESSION['name']);
redirect_to('../'); 
?>