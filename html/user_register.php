<?php
//header("content-Type: text/html; charset=Utf-8");
//$userInfo = $_POST;
//user_register.php用于接受用户注册信息，json格式{'nickname':str1,'phone_number':str2,'email':str3,'password':str4,'question':str7,'answer':str6,'occupation':str8,'sex':str9}
//$json = json_encode($userInfo,JSON_UNESCAPED_UNICODE);
//$file = fopen('user_register_json.json','w+');//此处将用户信息以json对象存储在file.json文件中，实际操作中应该由后台管理员存在数据库
//fwrite($file,$json);
//fclose($file);

//$arr=array('status'=>'fail','msg'=>mb_convert_encoding("错误信息",'UTF-8','GB2312'));//后台如果传的数据有中文用mb_convert_encoding编码为utf-8再传输json给前端，此json用于通知前端后台审核帖子的结果，以及审核不通过的理由
//echo json_encode($arr);

include("connectDB.php");

    $db=connectDB();
	
	$userInfo = $_POST;
	$nickname=$_POST['nickname'];
	$user_id=$_POST['nickname'];
	$phone_number=$_POST['phone_number'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$question=$_POST['question'];	
	$answer=$_POST['answer'];
	$occupation=$_POST['occupation'];
	$sex=$_POST['sex'];	
	
	$query = "select * from user where (nickname = '{$nickname}' ) "; 
	 $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("用户名已存在",'UTF-8','GB2312'));
    }
	else {
		$query = "select * from user where (phone_number = '{$phone_number}' ) "; 
	 $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("手机已被注册",'UTF-8','GB2312'));
    }
	else{
		$query = "select * from user where (email = '{$email}' ) "; 
	 $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("邮箱已被注册",'UTF-8','GB2312'));
    }
	else{
		$query ="INSERT INTO user (user_id,nickname,phone_number,email,password,question,answer,sex,occupation,grade,post_num) VALUES ('{$user_id}','{$nickname}', '{$phone_number}','{$email}','{$password}', '{$question}','{$answer}','{$sex}', '{$occupation}','1','0')";
	 $result = mysqli_query($db, $query);
    
		$arr=array('status'=>'success');
    }
	}
	}
 echo json_encode($arr);
?>