<?php
//$userInfo = $_POST;
//��ģ������û�id�����û���Ϣ�������޸ĸ�����Ϣʱ�ĳ�ʼ��
//$user_id=$_POST['user_id'];//
//$arr=array('nickname'=>mb_convert_encoding('�ܽ�','UTF-8','GB2312'),'phone_number'=>'13926095669','email'=>'zhoujie@163.com');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();                     //�û��޸���Ϣʱ����ԭ�е��û���Ϣ��ʾ�ڿ���
	$userInfo = $_POST;
	$user_id=$_POST['user_id'];
	
	$sql="SELECT nickname,phone_number,email FROM user WHERE user_id = '{$user_id}'";

    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);

?>