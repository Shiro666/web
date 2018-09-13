<?php
//此模块接收两个参数手机或邮箱，还有密码
//$userInfo = $_POST;
//$n=$_POST['phone_number_or_email'];
//$p=$_POST['password'];
//后端检查用户存在不存在、密码对不对，返回查询结果，失败返回{‘status’：‘fail’}，成功返回{‘status’：‘success’，‘user_id’，‘nickname’，‘phone_number’，‘email’，‘password’}
//$arr=array('status'=>'success','nickname'=>mb_convert_encoding('周杰','UTF-8','GB2312'),'phone_number'=>'13926095669','email'=>'zhoujie@163.com','password'=>'123456','user_id'=>'1');
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
    $n=$_POST['phone_number_or_email'];
    $p=$_POST['password'];
	$i=0;
    $sql="SELECT user_id,nickname,phone_number,email,password FROM user where (phone_number='{$n}' and password='{$p}')";
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["phone_number"]=$row["phone_number"];
    		$output[$i]["nickname"]=$row["nickname"];   
			$output[$i]["email"]=$row["email"];
			$output[$i]["user_id"]=$row["user_id"];
			$output[$i]["password"]=$row["password"];
			
			}
			$output[$i]["status"]="success";
    }
	else{
		$sql="SELECT user_id,nickname,phone_number,email,password FROM user where email='{$n}' and password='{$p}'";
	    $result=$db->query($sql);	
	    if($result->num_rows>0){
			
			while($row=$result->fetch_assoc()){    		
			
			$output[$i]["phone_number"]=$row["phone_number"];
    		$output[$i]["nickname"]=$row["nickname"];   
			$output[$i]["email"]=$row["email"];
			$output[$i]["user_id"]=$row["user_id"];
			$output[$i]["password"]=$row["password"];
			
			}
			$output[$i]["status"]="success";
    }
	else{
		$output[$i]["status"]="fail";
	}
	}
	
//$arr=array('status'=>'success','nickname'=>mb_convert_encoding('周杰','UTF-8','GB2312'),'phone_number'=>'13926095669','email'=>'zhoujie@163.com','password'=>'123456','user_id'=>'1');
//echo json_encode($arr);
echo json_encode($output);

?>