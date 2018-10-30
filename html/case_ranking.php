<?php

//case_hot_get.phpģ�飬�������ͣ�������ʾ��Щ����������Ϣ

//$arr=array(array('rank'=>'1','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_1'),array('rank'=>'2','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_2'),array('rank'=>'3','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_3'),array('rank'=>'4','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_4'),array('rank'=>'5','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_5'),array('rank'=>'6','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_6'),array('rank'=>'7','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_7'),array('rank'=>'8','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_8'),array('rank'=>'9','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_9'),array('rank'=>'10','title'=>mb_convert_encoding("�������µı����������µı����������µı���",'UTF-8','GB2312'),'case_id'=>'exp_10'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
    $posttype=$_POST['case_type'];

	
	
	switch($posttype){
		
	case '1':              //��ѯalipay֧��������
	
    $sql="select title,case_id from alipay order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '2':              //��ѯbusiness����
	
    $sql="select title,case_id from business order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '3':              //��ѯmobilebanking����
	
    $sql="select title,case_id from mobilebanking order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '4':              //��ѯnetwork����
	
    $sql="select title,case_id from network order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '5':              //��ѯonlineshopping����
	
    $sql="select title,case_id from onlineshopping order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '6':              //��ѯsociety����
	
    $sql="select title,case_id from society order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '7':              //��ѯtelecom����
	
    $sql="select title,case_id from telecom order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	case '8':              //��ѯwechat����
	
    $sql="select title,case_id from wechat order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
    break;
    
    case '9':              //finance
	
    $sql="select title,case_id from finance order by viewers desc limit 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);
	break;
	
	}
?>