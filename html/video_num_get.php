<?php
//$arr=array('video_total_num'=>'290');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	 $sql="SELECT * FROM video ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$arr=array('video_total_num'=>$rowcount);
	echo json_encode($arr);
?>