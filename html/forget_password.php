<?php
//��ģ��������������û���������
//$id=$_POST['phone_number_or_email'];//ע��˴�id����Ϊ����Ϊ�ֻ�������������Ҫ�ж�
//$question=$_POST['question'];
//$ans=$_POST['answer'];
//$passwd=$_POST['password'];
//�������˺��Ƿ���ڣ��ܱ�������Ƿ���ȷ
//$arr=array('status'=>'success');�ɹ�json
//$arr=array('status'=>'fail','type'=>'123');//ʧ��json��1��ʾ�˺Ų����ڣ�2��ʾ�ܱ�����ѡ�����3��ʾ�𰸳����������
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$id=$_POST['phone_number_or_email'];//ע��˴�id����Ϊ����Ϊ�ֻ�������������Ҫ�ж�
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
			$arr=array('status'=>'success'); //�ɹ�json
        }
		else $arr=array('status'=>'fail','type'=>'3'); //ʧ��json��1��ʾ�˺Ų����ڣ�2��ʾ�ܱ�����ѡ�����3��ʾ�𰸳����������
	}
	else $arr=array('status'=>'fail','type'=>'1'); //ʧ��json��1��ʾ�˺Ų����ڣ�2��ʾ�ܱ�����ѡ�����3��ʾ�𰸳����������
	echo json_encode($arr);
}

?>