<?php
//上传帖子，插入post表，新建一个post_id表，插入帖子内容到新建的post_id表，user表发帖数加一
/*header("content-Type: text/html; charset=Utf-8");
$userInfo = $_POST;
//PUBLISH.html调用up_post.php模块，提交用户发帖信息格式为格式数据{'user_id','title':标题,'content':正文,'type':帖子类型,'date':日期}，JSON_UNESCAPED_UNICODE用于中文编码
$json = json_encode($userInfo,JSON_UNESCAPED_UNICODE);
 $file = fopen('form.json','w+');//此处将帖子内容以json对象存储在file.json文件中，实际操作中应该由后台管理员存在数据库
fwrite($file,$json);
fclose($file);
$arr=array('status'=>'fail','msg'=>mb_convert_encoding("错误信息",'UTF-8','GB2312'));//后台如果传的数据有中文用mb_convert_encoding编码为utf-8再传输json给前端，此json用于通知前端后台审核帖子的结果，以及审核不通过的理由
echo json_encode($arr);
*/
include("connectDB.php");

    $db=connectDB();
	
	$userInfo = $_POST;
	$user_id=$_POST['user_id'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$type='['.$_POST['type'].']';
	$date=$_POST['date'];	
	
	$sql="SELECT * FROM post ";
	$result=$db->query($sql);
	$rowcount=mysqli_num_rows($result);
	$post_id='post_'.$rowcount;       //查找数据条数，生成post_id；
	
	$sql="INSERT INTO post (post_id,user_id,title,type, date,comments) VALUES ('{$post_id}','{$user_id}', '{$title}', '{$type}','{$date}','0')"; 
	$result=$db->query($sql);
	
	if ($result) {
    $arr=array('status'=>'success');
	$sql="create table $post_id (user_id text,content text,date text)";
	$res=$db->query($sql);
	
	$sql="INSERT INTO $post_id (user_id,content,date) VALUES ('{$user_id}','{$content}', '{$date}')";
	$res=$db->query($sql);
	
	$sql="update user set post_num=post_num+1 where user_id='{$user_id}'";
	$res=$db->query($sql);
	
} else {
    $err=mysqli_error($db);
	$arr=array('status'=>'fail','msg'=>mb_convert_encoding($err,'UTF-8','GB2312'));
}
echo json_encode($arr);

?>