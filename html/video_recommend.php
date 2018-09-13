<?php
//$arr=array(array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'1'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'2'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'3'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'4'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'5'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'6'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'7'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'21'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'22'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'23'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'24'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'25'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'26'),array('title'=>mb_convert_encoding('这里一共只要十个字。','UTF-8','GB2312'),'video_id'=>'27'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
	$i=0;
	$sql="SELECT title,video_id FROM video limit 0,13";
	$result=$db->query($sql);	
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){    					
			
    		$output[$i]["title"]=mb_substr($row["title"],0,15,"UTF8");   			
			$output[$i]["video_id"]=$row["video_id"];
					
			$i++;   		
    	}
    }

	echo json_encode($output);	
?>