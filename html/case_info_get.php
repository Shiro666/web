<?php
//$userInfo = $_POST;
//case_info_get.php模块，根据类型和页数，决定案例列表显示哪些案例信息
//$type=$_POST['case_type'];//约定用1234567这些数字指示类型
//$num=(int)$_POST['page_number'];//根据page_number和type决定从数据库中查找哪些案例信息，number相当于页数，一页八条，下面构造一个数组
//$arr=array(array('case_id'=>'d1','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d2','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d3','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d4','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d5','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d6','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d7','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d8','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d9','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d10','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d11','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d12','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d13','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d14','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d15','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d16','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d17','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d18','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'));
//$a=array_slice($arr,($num-1)*8,8);
//echo json_encode($a);

include("connectDB.php");

	$db=connectDB();
    $userInfo = $_POST;	
	$type=$_POST['case_type'];
	$num=(int)$_POST['page_number'];
	
	$firstone=($num*8)-8;
		
	switch($type){
		
	case '1':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM alipay limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	
	
	case '2':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM business limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '3':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM mobilebanking limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '4':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM network limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '5':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM onlineshopping limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '6':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM society limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '7':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM telecom limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '8':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM wechat limit $firstone,8";
	
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["case_id"]=$row["case_id"];
    		$output[$i]["title"]=mb_substr($row["title"],0,49,"UTF8");   
			$output[$i]["content"]=mb_substr($row["content"],0,60,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["viewers"]=$row["viewers"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	/*$query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }*/
	
	}
?>