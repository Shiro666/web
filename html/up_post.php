<?php
//�ϴ����ӣ�����post���½�һ��post_id�������������ݵ��½���post_id��user��������һ
/*header("content-Type: text/html; charset=Utf-8");
$userInfo = $_POST;
//PUBLISH.html����up_post.phpģ�飬�ύ�û�������Ϣ��ʽΪ��ʽ����{'user_id','title':����,'content':����,'type':��������,'date':����}��JSON_UNESCAPED_UNICODE�������ı���
$json = json_encode($userInfo,JSON_UNESCAPED_UNICODE);
 $file = fopen('form.json','w+');//�˴�������������json����洢��file.json�ļ��У�ʵ�ʲ�����Ӧ���ɺ�̨����Ա�������ݿ�
fwrite($file,$json);
fclose($file);
$arr=array('status'=>'fail','msg'=>mb_convert_encoding("������Ϣ",'UTF-8','GB2312'));//��̨�������������������mb_convert_encoding����Ϊutf-8�ٴ���json��ǰ�ˣ���json����֪ͨǰ�˺�̨������ӵĽ�����Լ���˲�ͨ��������
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
	$post_id='post_'.$rowcount;       //������������������post_id��
	
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