<?php
//Logout
header('Content-Type:text/html;charset=utf8');
session_start();
$_SESSION['login_user'] = null;
$_SESSION['username'] = null;
session_destroy();
echo '<script>';
echo 'alert("安全退出系统.");';
echo 'window.location.href="login.php";';
echo '</script>';
die;
?>