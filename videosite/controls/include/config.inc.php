<?php
error_reporting(0);
session_start();

require_once('SqlHelper.class.php');
$db = new SqlHelper('127.0.0.1','videosite','','root');
$db->execute_dml('SET NAMES UTF8');
include('fun.inc.php');
?>