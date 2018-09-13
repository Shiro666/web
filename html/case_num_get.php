<?php
//$userInfo = $_POST;
//case_num_get.php模块，根据案例类型，传递案例数量,'case_type'用‘1’‘2’‘3’‘4’...表示
//$case_type=$_POST['case_type'];
//根据case_type查询对应案例总数
//$arr=array('total_num'=>'18');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
    $case_type=$_POST['case_type'];

	$arr=array();
	
	switch($case_type){
	case '1':              //查询alipay支付宝数量
	
    $sql="SELECT * FROM alipay ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '2':              //查询business商业数量
	
    $sql="SELECT * FROM business ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '3':              //查询mobilebanking数量
	
    $sql="SELECT * FROM mobilebanking ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '4':              //查询network
	
    $sql="SELECT * FROM network ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '5':              //查询onlineshopping数量
	
    $sql="SELECT * FROM onlineshopping ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '6':              //查询society数量
	
    $sql="SELECT * FROM society ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '7':              //查询telecom数量
	
    $sql="SELECT * FROM telecom ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	
	case '8':              //查询wechat数量
	
    $sql="SELECT * FROM wechat ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('total_num'=>$rowcount);
	echo json_encode($arr);
	break;
	}
?>