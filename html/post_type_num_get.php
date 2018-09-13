<?php
// 此php模块返回各类帖子数量
//$arr = array('total_num' => '135', 'exp_num' => '45', 'commu_num' => '45', 'expo_num' => '45');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();

	$arr=array();
		
    $sql="SELECT * FROM post ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	
	$sql="SELECT * FROM post WHERE type like '%被骗经历%' ";
	$resultt=$db->query($sql);
	$expcount=mysqli_num_rows($resultt);
	
	$sql="SELECT * FROM post WHERE type like '%防骗交流%' ";
	$resulttt=$db->query($sql);
	$commucount=mysqli_num_rows($resulttt);
	
	$sql="SELECT * FROM post WHERE type like '%曝光骗子%' ";
	$resultttt=$db->query($sql);
	$expocount=mysqli_num_rows($resultttt);
	
	$arr=array('total_num' => $rowcount, 'exp_num' => $expcount, 'commu_num' => $commucount, 'expo_num' =>$expocount);
	echo json_encode($arr);
	

?>