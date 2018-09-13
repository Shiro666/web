<?php
//插入评论，在post表comment加一
include("connectDB.php");

    $db=connectDB();
	
	$userInfo = $_POST;
	
	$user_id=$_POST['user_id'];
	$content=$_POST['content'];
	$date=$_POST['date'];
	$post_id=$_POST['post_id'];

	$sql="INSERT INTO $post_id (user_id,content, date) VALUES ('{$user_id}', '{$content}', '{$date}')"; 
	$result=$db->query($sql);
	
	if ($result) {
    $arr=array('status'=>'success');
	$sql="update post set comments=comments+1 where post_id='{$post_id}'"; //comments=comments+1不知道能不能这么写
	$res=$db->query($sql);
	
} else {
    $err=mysqli_error($db);
	$arr=array('status'=>'fail','msg'=>mb_convert_encoding($err,'UTF-8','GB2312'));
}

echo json_encode($arr);




?>