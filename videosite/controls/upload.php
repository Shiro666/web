<?php
require_once('include/config.inc.php');
require_once('FileUpload.php');
$uploaded = upload('../uploads/', '../uploads/upload_tmp/');
$pid = $_GET['pid'];
$fileName = substr($uploaded, 0, strrpos($uploaded, '.'));
$img_path = 'uploads/' . $uploaded;
$sql = 'INSERT INTO photo(pid,url) VALUES(' . $pid . ',"' . $img_path . '")';
$db->execute_dml($sql);

