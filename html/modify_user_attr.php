<?php

//此模块用于修改个人信息
//$user_id=$_POST['user_id'];//
//$nickname=$_POST['nickname'];
//$phone_number=$_POST['phone_number'];
//$email=$_POST['email'];
//$password=$_POST['password'];
//$arr=array('status'=>'success');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	
	$userInfo = $_POST;
	$user_id=$_POST['user_id'];
    $nickname=$_POST['nickname'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $password=$_POST['password'];
	

	$query = "select * from user where user_id = 'lalala'";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1) {
        $update = "update user set nickname = '{$nickname}' , phone_number = '{$phone_number}' , email = '{$email}',password = '{$password}' where user_id = '{$user_id}'";
        $result = mysqli_query($db, $update);
        $arr=array('status'=>'success');
	}
	else{ $arr=array('status'=>'fail','msg'=>'修改失败');}
	echo json_encode($arr);

?>