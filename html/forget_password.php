<?php
//此模块帮助忘记密码用户重置密码
//$id=$_POST['phone_number_or_email'];//注意此处id设置为可以为手机，或邮箱者需要判断
//$question=$_POST['question'];
//$ans=$_POST['answer'];
//$passwd=$_POST['password'];
//后端审核账号是否存在，密保问题答案是否正确
//$arr=array('status'=>'success');成功json
//$arr=array('status'=>'fail','type'=>'123');//失败json，1表示账号不存在，2表示密保问题选择出错，3表示答案出错，排列组合
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$id=$_POST['phone_number_or_email'];//注意此处id设置为可以为手机，或邮箱者需要判断
   $question=$_POST['question'];
   $ans=$_POST['answer'];
   $passwd=$_POST['password'];
   
if ($db) {
	$query = "select * from user where phone_number = '{$id}' or email = '{$id}'";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1) {
        $query = "select * from user where (phone_number = '{$id}' or email = '{$id}') and answer = '{$ans}'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
			$update = "update user set password = '{$passwd}' where phone_number = '{$id}' or email = '{$id}'";
			$result = mysqli_query($db, $update);
			$arr=array('status'=>'success'); //成功json
        }
		else $arr=array('status'=>'fail','type'=>'3'); //失败json，1表示账号不存在，2表示密保问题选择出错，3表示答案出错，排列组合
	}
	else $arr=array('status'=>'fail','type'=>'1'); //失败json，1表示账号不存在，2表示密保问题选择出错，3表示答案出错，排列组合
	echo json_encode($arr);
}

?>