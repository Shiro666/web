<?php
/*$userInfo = $_POST;
//BBS.html调用post_info_get.php模块，根据页数，决定显示哪些帖子信息
$post_type=$_POST['post_type'];
$num=(int)$_POST['page_number'];//根据post_type(0：全部,1：被骗经历,2防骗交流,3曝光骗子),number决定从数据库中查找哪些帖子信息，因为要翻页，number相当于页数，一页十个，下面构造一个数组
$arr=array(array('post_id'=>'1','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'1'),array('post_id'=>'2','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'2'),array('post_id'=>'3','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'3'),array('post_id'=>'4','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'4'),array('post_id'=>'5','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'5'),array('post_id'=>'6','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'6'),array('post_id'=>'7','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'7'),array('post_id'=>'8','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'8'),array('post_id'=>'9','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'9'),array('post_id'=>'10','type'=>mb_convert_encoding("[被骗经历]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'10'),array('post_id'=>'11','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'11'),array('post_id'=>'12','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'12'),array('post_id'=>'13','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'13'),array('post_id'=>'14','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'14'),array('post_id'=>'15','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'15'),array('post_id'=>'16','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'16'),array('post_id'=>'17','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'17'),array('post_id'=>'18','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'18'),array('post_id'=>'19','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'19'),array('post_id'=>'20','type'=>mb_convert_encoding("[防骗交流]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'20'),array('post_id'=>'21','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'21'),array('post_id'=>'22','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'22'),array('post_id'=>'23','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'23'),array('post_id'=>'24','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'24'),array('post_id'=>'25','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'25'),array('post_id'=>'26','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'26'),array('post_id'=>'27','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'27'),array('post_id'=>'28','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'28'),array('post_id'=>'29','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'29'),array('post_id'=>'30','type'=>mb_convert_encoding("[曝光骗子]",'UTF-8','GB2312'),'title'=>mb_convert_encoding("这是帖子标题",'UTF-8','GB2312'),'date'=>'2018-4-12','comments'=>'30'));
$a=array_slice($arr,($num-1)*10,10);
echo json_encode($a);
*/
include("connectDB.php");

	$db=connectDB();
    $userInfo = $_POST;	
	$post_type=$_POST['post_type'];	
	$num=(int)$_POST['page_number'];
	
	$firstone=($num*10)-10;
		
	switch($post_type){
		
	case '0':              //查询全部帖子
	
    $sql="SELECT post_id,type,title,date,comments FROM post limit $firstone,10";
	$i=0;
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["post_id"]=$row["post_id"];
    		$output[$i]["type"]=$row["type"];
			$output[$i]["title"]=mb_substr($row["title"],0,40,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["comments"]=$row["comments"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '1':              //查询全部被骗经历帖子
	
	$expr=mb_convert_encoding("被骗经历",'UTF-8','GB2312');
    $sql="SELECT post_id,type,title,date,comments FROM post WHERE type like '%$expr%'  limit $firstone,10";
	
	$i=0;
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["post_id"]=$row["post_id"];
    		$output[$i]["type"]=$row["type"];
			$output[$i]["title"]=mb_substr($row["title"],0,40,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["comments"]=$row["comments"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '2':              //查询全部防骗交流帖子
	
	$expr=mb_convert_encoding("防骗交流",'UTF-8','GB2312');
    $sql="SELECT post_id,type,title,date,comments FROM post WHERE type like '%$expr%'  limit $firstone,10";
	
	$i=0;
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["post_id"]=$row["post_id"];
    		$output[$i]["type"]=$row["type"];
			$output[$i]["title"]=mb_substr($row["title"],0,40,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["comments"]=$row["comments"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	case '3':              //查询全部曝光骗子帖子
	
	$expr=mb_convert_encoding("曝光骗子",'UTF-8','GB2312');
    $sql="SELECT post_id,type,title,date,comments FROM post WHERE type like '%$expr%'  limit $firstone,10";
	
	$i=0;
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    		
			
			$output[$i]["post_id"]=$row["post_id"];
    		$output[$i]["type"]=$row["type"];
			$output[$i]["title"]=mb_substr($row["title"],0,40,"UTF8")."...";
			$output[$i]["date"]=$row["date"];
			$output[$i]["comments"]=$row["comments"];
					
			$i++;   		
    	}
    }
	
	echo json_encode($output);
	break;
	
	}
	
?>
