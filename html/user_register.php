<?php
//header("content-Type: text/html; charset=Utf-8");
//$userInfo = $_POST;
//user_register.php���ڽ����û�ע����Ϣ��json��ʽ{'nickname':str1,'phone_number':str2,'email':str3,'password':str4,'question':str7,'answer':str6,'occupation':str8,'sex':str9}
//$json = json_encode($userInfo,JSON_UNESCAPED_UNICODE);
//$file = fopen('user_register_json.json','w+');//�˴����û���Ϣ��json����洢��file.json�ļ��У�ʵ�ʲ�����Ӧ���ɺ�̨����Ա�������ݿ�
//fwrite($file,$json);
//fclose($file);

//$arr=array('status'=>'fail','msg'=>mb_convert_encoding("������Ϣ",'UTF-8','GB2312'));//��̨�������������������mb_convert_encoding����Ϊutf-8�ٴ���json��ǰ�ˣ���json����֪ͨǰ�˺�̨������ӵĽ�����Լ���˲�ͨ��������
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
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("�û����Ѵ���",'UTF-8','GB2312'));
    }
	else {
		$query = "select * from user where (phone_number = '{$phone_number}' ) "; 
	 $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("�ֻ��ѱ�ע��",'UTF-8','GB2312'));
    }
	else{
		$query = "select * from user where (email = '{$email}' ) "; 
	 $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
		$arr=array('status'=>'fail','msg'=>mb_convert_encoding("�����ѱ�ע��",'UTF-8','GB2312'));
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