<?php
//$userInfo = $_POST;
//case_num_get.phpģ�飬���ݰ������ͣ����ݰ�������,'case_type'�á�1����2����3����4��...��ʾ
//$case_type=$_POST['case_type'];
//����case_type��ѯ��Ӧ��������
//$arr=array('total_num'=>'18');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
    $case_type=$_POST['case_type'];

	$arr=array();
	
	switch($case_type){
	case '1':              //��ѯalipay֧��������
	
    $sql="SELECT * FROM alipay ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '2':              //��ѯbusiness��ҵ����
	
    $sql="SELECT * FROM business ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '3':              //��ѯmobilebanking����
	
    $sql="SELECT * FROM mobilebanking ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '4':              //��ѯnetwork
	
    $sql="SELECT * FROM network ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '5':              //��ѯonlineshopping����
	
    $sql="SELECT * FROM onlineshopping ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '6':              //��ѯsociety����
	
    $sql="SELECT * FROM society ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '7':              //��ѯtelecom����
	
    $sql="SELECT * FROM telecom ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '8':              //��ѯwechat����
	
    $sql="SELECT * FROM wechat ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;

	case '9':              //��ѯwechat����
	
    $sql="SELECT * FROM finance ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	}
?>