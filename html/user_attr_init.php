<?php
//$userInfo = $_POST;
//此模块接受用户id返回用户信息，用于修改个人信息时的初始化
//$user_id=$_POST['user_id'];//
//$arr=array('nickname'=>mb_convert_encoding('周杰','UTF-8','GB2312'),'phone_number'=>'13926095669','email'=>'zhoujie@163.com');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();                     //用户修改信息时，将原有的用户信息显示在框内
	$userInfo = $_POST;
	$user_id=$_POST['user_id'];
	
	$sql="SELECT nickname,phone_number,email FROM user WHERE user_id = '{$user_id}'";

    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);

?>