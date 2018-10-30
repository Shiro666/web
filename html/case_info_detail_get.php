<?php
//��ģ�����case_id��ʾ���尸����Ϣ
include("connectDB.php");

	$db=connectDB();
    $case_id=$_POST['case_id'];

	$title;	
	$content;
	$date;
	$viewers;
	$arr=array();

    $aa=substr($case_id, 0,1);

switch($aa){
	case 'a':              //��ѯ֧����թƭ
	$sql="UPDATE alipay set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM alipay WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 'b':                       //��ѯ��ҵթƭ
	$sql="UPDATE business set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers  FROM business WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 'f':                         //finance
	$sql="UPDATE finance set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
	$sql="SELECT title,content,date,viewers FROM finance WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$title=$row["title"];
			$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
		}
	}
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;

	case 'm':                        //��ѯ�ֻ�թƭ
	$sql="UPDATE mobilebanking set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers  FROM mobilebanking WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 'n':                        //��ѯ����թƭ
	$sql="UPDATE network set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM network WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 'o':                        //��ѯ����թƭ
	$sql="UPDATE onlineshopping set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM onlineshopping WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 's':                         //��ѯ���թƭ
	$sql="UPDATE society set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM society WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 't':                         //��ѯ����թƭ
	$sql="UPDATE telecom set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM telecom WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
	
	case 'w':                         //��ѯ΢��թƭ
	$sql="UPDATE wechat set viewers=viewers+1 WHERE case_id='{$case_id}'";
	mysqli_query($db,$sql);
    $sql="SELECT title,content,date,viewers FROM wechat WHERE case_id='{$case_id}'";
	$result=$db->query($sql);
	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		
    		$title=$row["title"];
    		$content=$row["content"];
			$date=$row["date"];
			$viewers=$row["viewers"];
    	}
    }
	$arr=array('title'=>$title,'content'=>$content,'date'=>$date,'viewers'=>$viewers);
	echo json_encode($arr);
	break;
}	
		

//��˸���case_id���Ұ�������
//$arr=array('title'=>mb_convert_encoding('��������','UTF-8','GB2312'),'content'=>mb_convert_encoding('<p>��Ҫ�����У�<br>-����ʶ��ļ���֮�ڣ�ɾ����δ�������ϵ��˺š���Ȼϣ����Ҳ�رա��������ʣ����Ƿ񻹺��������졣ǿ����������һ���ӣ����Ǽ��顣ǿ����Ե�֡������ģ�ÿ��������顣��ϧ����Щ���õĻ�����ƭ�����ã�ƭ�ˡ�<br>-��ʱ��͸©���㼸����Ƭ���������֤���϶�Ҳ�Ǽٵġ���Ҫ��Ƭ���Ͳ����ˡ�Ҳ��û�ˡ�<br>-����˵ȥ�������������������ģ����ֽ�ڡ����ǣ����棡���棡���棡��Ҫ������˵���飡����<br>-�绰���죬�����Ĵ�������أ�ҧ�ֲ��壬��ӱ��������������ģ����ű��飬ʵ�ڲ���ְҵ���ˡ�������һ���Ķ��ѡ�ƭ�ӵ��Ŷӡ�<br>-ƭ���˽⵽��Ĺ�������Ϣ�����г������󣬻������㶨ΪĿ�꣬�Ϳ�ʼ��ף���ϸ����Ҳ�ܵ��ף���Ϊһ�������ĸ߼����ˣ�Ҫ�����Ϳͻ��򽻵�����̸��ֹ�г��롣Ӣ�ĵ���Ҳ����������<br>-�绰û��������ʾ�����ֻ�����ʾunknown. ������壬99%������������ƭ�ӣ��������Ӵ����ˣ���ȻҲ���ɹ���ʲô����ˡ�����äĿ�����ˡ�<br>-ƭ�ӴӲ�����Ƶ���죬Ҳ�������������ѵĳ���<br>-������������Ϊ���ǵĽ����ڴ�ƴ��һ�ж���ֵ�õ�!���Ů����˼���ǳ���ȴ�!��9�¿�ʼ���ȵ�æ��һ��ʱ���ֱ��12�£�����ʼ��һ����Ŀ������VIP�ͻ���ֻ�й̶������˾����һ���ı�֤��ץס���ᣬ׬Ǯ��<br>������������������һ��ģ���Ϊ��ʵ�е���ʵ������������һ�ж������!<br>Ȼ��˵��10-200�̿ڣ����600����һ����ƭ��ϲ��Ƶ��ʹ�á���������ʡ�����˵��Ϊ����ĻͶ�ʣ�����Ϊ�����ˣ����������ʽ𱻼�ܣ��������������ˣ����������ѡ�̫���ţ�<br>-�ز���νͶ�ʹ�˾����վ�͵�ַ�����Ӳ��ˣ�����û�鵽����ƭ��������ȥ��������ʦ���ѽ��룬ϣ����Ҷ�������ץ�����ǣ����̡�10�ꡣ<br>-�����ƭ��һ�Σ��ͻ���ƭ�ӵ�ͬ��Գ��Ƕ��£���绰�㣬��Ϊ������Ϳ��һ���Ϳͻ��������˾û����ǰ�Ľ��׼�¼������Ҫ��2�����𣬰�����ʱ��Ա��Ҫ�㽻���á�����˵�Լ����ܻ���Ϊ˽ȯ�����飬�㲻�����Ρ���ϣ����Ԥ�Գ��棬����ȥ����Ȼ������ȥ�绰����Զû�˽�������Ų���һ���˲�����<br>-Ҫ�Է�������������͹�˾��<br>-ƭ��ϲ�������ֵ�ID�����硰688������6688��֮��ġ��Գ�רҵ�Ǿ��ã����ϲƾ���ѧ��<br><br>ͨƪ�����¼����̫ʹ�ñ����š��������÷����֡�<br>ƭ�����õĻ���˺ţ���ȴ�����˼����֣������Ǹ��ƺ�ճ���ģ�<br>����Ƽ��WU XIANG PING<br>�˺ţ�780232914888<br>�����У�141 prince Edward Road Branch Kowloon<br>�����е�ַ�� Hong Kong Kowloon Hang Seng Bank</p>','UTF-8','GB2312'),'date'=>'2018-1-1','viewers'=>'20');
//echo json_encode($arr);
?>