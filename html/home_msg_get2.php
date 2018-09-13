<?php
//此模块用于返回home中每一个栏目案例的简要信息，json格式为由一个{'case_id',‘title’：‘’，‘content’:'','pic':'这张照片可以一个主题一张'}和六个这样的结构{'case_id',‘title’：‘’，‘date’：‘’}组成
//home_msg_get?.php的性质是一样的，这一个是business诈骗
//$arr=array(array('case_id'=>'1','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'content'=>mb_convert_encoding("这里是第一条案例的内容这里是第一条案例的内容这里是第一条案例的内容这里是第一条案例的内容这里是第一条案例的内容....",'UTF-8','GB2312'),'pic'=>'images/15018348792660.png'),array('case_id'=>'2','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'),array('case_id'=>'3','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'),array('case_id'=>'4','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'),array('case_id'=>'5','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'),array('case_id'=>'6','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'),array('case_id'=>'7','title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'date'=>'2018-1-1'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	
    $i=0;
	$sql="SELECT case_id,title,content FROM business order by date desc limit 1";
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,19,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,55,"UTF8")."...";
			$output[$i]['pic']="images/type2pic.webp";			
			$i++;   		
    	}
    }
	
	$sql="SELECT case_id,title,date FROM business order by date desc limit 1,6";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=$row["title"];
			$output[$i]["date"]=$row["date"];	
			$i++;    		
    	}
    }	
			
    echo json_encode($output);
?>