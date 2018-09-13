<?php
//$userInfo = $_POST;
//此模块接收post_id，查找帖子相关信息需要返回json一个{‘title’‘comments’}和若干个{‘user_id’,'nickname',‘pro_pic_path’：根据性别的头像显示,‘date’,‘content’,'grade_pic_path'}
//$type=$_POST['post_id'];
//$arr=array(array('title'=>mb_convert_encoding('帖子标题','UTF-8','GB2312'),'comments'=>'6'),array('user_id'=>'1','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'),array('user_id'=>'2','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'),array('user_id'=>'3','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'),array('user_id'=>'4','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'),array('user_id'=>'5','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'),array('user_id'=>'6','nickname'=>mb_convert_encoding('用户名','UTF-8','GB2312'),'pro_pic_path'=>'images/female.webp','grade_pic_path'=>'images/fourstars.webp','post_num'=>'5','content'=>mb_convert_encoding('这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文这是是正文这是正文这是正文这是正文这是正文这是正文','UTF-8','GB2312'),'date'=>'2018-1-1'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
	$post_id=$_POST['post_id'];
	
    $i=0;
	$sql="SELECT title,comments FROM post WHERE post_id='{$post_id}' ";
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["title"]=$row["title"];
    		$output[$i]["comments"]=$row["comments"];   
			
					
			$i++;   		
    	}
    }
	
	$sql="SELECT user_id,content,date FROM $post_id  ";        //查询post_id表user_id,content,date
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["user_id"]=$row["user_id"];						             	
    		$output[$i]["content"]=$row["content"];   
			$output[$i]["date"]=$row["date"]; 
		
			$i++;   		
    	}
    }
	
    $j=$i-1;
	$i=1;
	for($i=1;$i<=$j;$i++){
		$userid=$output[$i]["user_id"];
		//$userid='admin';
		$sql="SELECT nickname,sex,grade,post_num FROM user where user_id='{$userid}' ";   //查询user表nickname,sex,grade
	    $resultt=$db->query($sql);	
			
	    if($resultt->num_rows>0){
    	while($row=$resultt->fetch_assoc()){    		
			
			$output[$i]["nickname"]=$row["nickname"];  
			$output[$i]["post_num"]=$row["post_num"];
				
		    if($row["sex"]=="女"){                             //根据性别赋予不同的头像
			$output[$i]["pro_pic_path"]='images/female.webp';}
				else{
					$output[$i]["pro_pic_path"]='images/male.webp';
			}
					
			switch($row["grade"]){               //根据等级赋予不同的星星图片
				case '1':
				$output[$i]["grade_pic_path"]='images/onestar.webp';  
				break;
					
				case '2':
				$output[$i]["grade_pic_path"]='images/twostars.webp';  
				break;
					
				case '3':
				$output[$i]["grade_pic_path"]='images/threestars.webp';  
				break;
					
				case '4':
				$output[$i]["grade_pic_path"]='images/fourstars.webp';  
				break;
					
				case '5':
				$output[$i]["grade_pic_path"]='images/fivestars.webp';  
				break;
					
			}
		
    	}
    }
	}
	
	echo json_encode($output);
?>