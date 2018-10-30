<?php
//$userInfo = $_POST;
//case_info_get.phpģ�飬�������ͺ�ҳ�������������б���ʾ��Щ������Ϣ
//$type=$_POST['case_type'];//Լ����1234567��Щ����ָʾ����
//$num=(int)$_POST['page_number'];//����page_number��type���������ݿ��в�����Щ������Ϣ��number�൱��ҳ����һҳ���������湹��һ������
//$arr=array(array('case_id'=>'d1','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d2','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d3','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d4','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d5','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d6','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d7','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d8','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d9','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d10','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d11','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d12','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d13','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d14','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d15','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d16','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d17','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d18','content'=>mb_convert_encoding("��������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("��������",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'));
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

	case '9':              
	$i=0;
    $sql="SELECT case_id,content,title,date,viewers FROM finance limit $firstone,8";
	
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