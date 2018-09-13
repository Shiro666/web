<?php
//此模块接收case_id显示具体案例信息
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
	case 'a':              //查询支付宝诈骗
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
	
	case 'b':                       //查询商业诈骗
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
	
	case 'm':                        //查询手机诈骗
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
	
	case 'n':                        //查询网络诈骗
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
	
	case 'o':                        //查询网购诈骗
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
	
	case 's':                         //查询社会诈骗
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
	
	case 't':                         //查询电信诈骗
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
	
	case 'w':                         //查询微信诈骗
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
		

//后端根据case_id查找案例内容
//$arr=array('title'=>mb_convert_encoding('案例标题','UTF-8','GB2312'),'content'=>mb_convert_encoding('<p>主要特征有：<br>-在认识你的几天之内，删除在未名交友上的账号。当然希望你也关闭。反复疑问，你是否还和他人聊天。强调：婚姻是一辈子，不是激情。强调：缘分。有耐心，每天上线陪伴。可惜了这些美好的话，被骗子滥用，骗人。<br>-找时机透漏给你几张照片，还有身份证，肯定也是假的。再要照片，就不给了。也许没了。<br>-当你说去看他，会遭遇推三阻四，各种藉口。克星：见面！见面！见面！重要的事情说三遍！！！<br>-电话聊天，明星四川口音很重，咬字不清，像从冰冷的猪窝里打来的，吸着鼻涕，实在不像职业商人。就怕猪一样的队友。骗子的团队。<br>-骗子了解到你的工作，作息，还有车，房后，基本把你定为目标，就开始表白，仔细想想也很低俗，作为一个真正的高级商人，要经常和客户打交道，言谈举止有出入。英文单词也不懂几个。<br>-电话没有来电显示，在手机上显示unknown. 必须查清，99%可能是遇到了骗子！！！妹子大意了，虽然也怀疑过，什么年代了。还是盲目自信了。<br>-骗子从不提视频聊天，也不符合男生交友的常理。<br>-他告诉你他在为你们的将来在打拼，一切都是值得的!他深暗女人心思，非常会等待!从9月开始，等到忙了一段时间后，直到12月，他开始做一个项目，负责VIP客户，只有固定名额，公司还有一定的保证金。抓住机会，赚钱！<br>慢，慢，还是慢，让一切模拟成为现实中的事实，让你相信这一切都是真的!<br>然后说有10-200盘口，最低600美金一个。骗子喜欢频繁使用‘美金’这个词。他会说因为是内幕投资，他作为参与人，他的银行资金被监管，甚至家里所有人，还包括朋友。太夸张！<br>-必查所谓投资公司，网站和地址。妹子查了，网上没查到，被骗子搪塞过去。后有律师朋友介入，希望大家都报警，抓到他们，判刑》10年。<br>-如果被骗第一次，就会有骗子的同伙，自称是董事，打电话你，因为他擅自涂改一个就客户的名额，公司没有以前的交易记录，所以要交2万美金，办理临时会员。要你交费用。还会说自己可能会因为私券被调查，搞不好坐牢。真希望他预言成真，坐牢去。当然，你打回去电话，永远没人接听。大概不是一个人操作。<br>-要对方的座机，家里和公司。<br>-骗子喜欢带数字的ID，比如“688”，“6688”之类的。自称专业是经济，西南财经大学。<br><br>通篇聊天记录，不太使用标点符号。（？）用繁体字。<br>骗子所用的汇款账号：（却是用了简体字，可能是复制和粘贴的）<br>吴湘萍：WU XIANG PING<br>账号：780232914888<br>开户行：141 prince Edward Road Branch Kowloon<br>开户行地址： Hong Kong Kowloon Hang Seng Bank</p>','UTF-8','GB2312'),'date'=>'2018-1-1','viewers'=>'20');
//echo json_encode($arr);
?>