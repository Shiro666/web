<?php
//$userInfo = $_POST;
//此模块接受用户id返回用户信息，{‘pro_pic_path’:分性别头像暂，‘nickname’，‘occupation’，‘sex’,'grade','grade_pic_path'}发过那些帖子{‘post_id’‘title’‘comments’‘date’}
//$type=$_POST['user_id'];//
//$arr=array(array('pro_pic_path'=>'images/female.webp','nickname'=>mb_convert_encoding('周杰','UTF-8','GB2312'),'occupation'=>mb_convert_encoding('学生','UTF-8','GB2312'),'sex'=>mb_convert_encoding('女','UTF-8','GB2312'),'grade'=>mb_convert_encoding('五','UTF-8','GB2312'),'grade_pic_path'=>'images/fivestars.webp'),array('post_id'=>'exp_1','title'=>mb_convert_encoding('帖子一标题','UTF-8','GB2312'),'comments'=>'20','date'=>'2018-1-1'),array('post_id'=>'exp_1','title'=>mb_convert_encoding('帖子二标题','UTF-8','GB2312'),'comments'=>'20','date'=>'2018-1-1'),array('post_id'=>'exp_1','title'=>mb_convert_encoding('帖子三标题','UTF-8','GB2312'),'comments'=>'20','date'=>'2018-1-1'),array('post_id'=>'exp_1','title'=>mb_convert_encoding('帖子四标题','UTF-8','GB2312'),'comments'=>'20','date'=>'2018-1-1'),array('post_id'=>'exp_1','title'=>mb_convert_encoding('帖子五标题','UTF-8','GB2312'),'comments'=>'20','date'=>'2018-1-1'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$userInfo = $_POST;
	$user_id=$_POST['user_id'];
	
    $i=0;
	$sql="SELECT nickname,occupation,sex,grade FROM user WHERE user_id='{$user_id}' ";     //第一条查询user表，显示用户信息
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["nickname"]=$row["nickname"];
    		$output[$i]["occupation"]=$row["occupation"];  
			$output[$i]["sex"]=$row["sex"];
			
			
			if($row["sex"]=="女"){                             //根据性别赋予不同的头像
			$output[$i]["pro_pic_path"]='images/female.webp';}
				else{
					$output[$i]["pro_pic_path"]='images/male.webp';
			}
			
			switch($row["grade"]){               //根据等级赋予不同的星星图片，等级中文字表示
				case '1':
				$output[$i]["grade_pic_path"]='images/onestar.webp'; 
                $output[$i]["grade"]="一";				
				break;
					
				case '2':
				$output[$i]["grade_pic_path"]='images/twostars.webp'; 
				$output[$i]["grade"]="二";	
				break;
					
				case '3':
				$output[$i]["grade_pic_path"]='images/threestars.webp'; 
				$output[$i]["grade"]="三";	
				break;
					
				case '4':
				$output[$i]["grade_pic_path"]='images/fourstars.webp'; 
				$output[$i]["grade"]="四";	
				break;
					
				case '5':
				$output[$i]["grade_pic_path"]='images/fivestars.webp';  
				$output[$i]["grade"]="五";	
				break;
					
			}
					
			$i++;   		
    	}
    }
	
	$sql="SELECT post_id,title,comments,date FROM post where user_id='{$user_id}' ";        //查询post_id表user_id,content,date
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["post_id"]=$row["post_id"];						             	
    		$output[$i]["title"]=$row["title"];   
			$output[$i]["comments"]=$row["comments"];
			$output[$i]["date"]=$row["date"];
		
			$i++;   		
    	}
    }
echo json_encode($output);

?>