<?php

//case_hot_get.php模块，根据类型，决定显示哪些案例排行信息

//$arr=array(array('rank'=>'1','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_1'),array('rank'=>'2','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_2'),array('rank'=>'3','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_3'),array('rank'=>'4','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_4'),array('rank'=>'5','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_5'),array('rank'=>'6','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_6'),array('rank'=>'7','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_7'),array('rank'=>'8','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_8'),array('rank'=>'9','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_9'),array('rank'=>'10','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'case_id'=>'exp_10'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
    $posttype=$_POST['case_type'];

	
	
	switch($posttype){
		
	case '1':              //查询alipay支付宝最热
	
    $sql="select title,case_id from alipay order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '2':              //查询business最热
	
    $sql="select title,case_id from business order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '3':              //查询mobilebanking最热
	
    $sql="select title,case_id from mobilebanking order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '4':              //查询network最热
	
    $sql="select title,case_id from network order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '5':              //查询onlineshopping最热
	
    $sql="select title,case_id from onlineshopping order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '6':              //查询society最热
	
    $sql="select title,case_id from society order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '7':              //查询telecom最热
	
    $sql="select title,case_id from telecom order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '8':              //查询wechat最热
	
    $sql="select title,case_id from wechat order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	}
?>