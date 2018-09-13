<?php
//$arr=array(array('rank'=>'1','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_1'),array('rank'=>'2','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exo_2'),array('rank'=>'3','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_3'),array('rank'=>'4','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_4'),array('rank'=>'5','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_5'),array('rank'=>'6','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_6'),array('rank'=>'7','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_7'),array('rank'=>'8','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_8'),array('rank'=>'9','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_9'),array('rank'=>'10','title'=>mb_convert_encoding("这是文章的标题这是文章的标题这是文章的标题",'UTF-8','GB2312'),'post_id'=>'exp_10'));
//echo json_encode($arr);

include("connectDB.php");

	$db=connectDB();
 
    $sql="SELECT title,post_id FROM post WHERE type like '%防骗交流%' ORDER BY comments DESC LIMIT 10";
    $query=mysqli_query($db,$sql);
    while($result=mysqli_fetch_assoc($query)){
        $output[]=$result; }
		
	echo json_encode($output);

?>