<?php
//$search_str=$_POST['search_str'];
//根据search_str查询数据库
//$arr=array(array('status'=>'success'),array('case_id'=>'d1','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d2','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d3','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d4','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d5','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d6','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d7','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d8','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d9','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d10','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d11','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d12','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d13','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d14','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d15','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d16','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d17','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'),array('case_id'=>'d18','content'=>mb_convert_encoding("这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文这是正文...",'UTF-8','GB2312'),'title'=>mb_convert_encoding("案例标题",'UTF-8','GB2312'),'date'=>'2018-1-10','viewers'=>'36'));
//$arr=array(array('status'=>'fail'),array('msg'=>mb_convert_encoding('未搜索到相关结果','UTF-8','GB2312')))
//echo json_encode($arr);

define("USERNAME","root");
    define("PASSWORD","");
    define("DBNAME","cheat");

    function connectDB(){
        $conn=@mysqli_connect("localhost",USERNAME,PASSWORD,DBNAME);
        if(!mysqli_connect_errno($conn)){
            mysqli_set_charset($conn,"utf8");
        }else{
            die("Connect failed");
        }
        return $conn;
    }

    function inquiryDB($table_name,&$case_list,&$output,&$num,$word,$db){
        $sql="SELECT case_id,content,title,date,viewers FROM ".$table_name." WHERE keywords like '%".$word."%'";
        $result=$db->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                if(!in_array($row["case_id"],$case_list)){
                    $case_list[$num]=$row["case_id"];
                    $output[$num]["case_id"]=$row["case_id"];
                    $output[$num]["content"]=$row["content"];
                    $output[$num]["title"]=$row["title"];
                    $output[$num]["date"]=$row["date"];
                    $output[$num]["viewers"]=$row["viewers"];
                    $num++;
                }
            }
        }
    }

    $db=connectDB();

    $text =$_POST["search_str"];

	if(!extension_loaded('scws')) {
		dl('scws.' . PHP_SHLIB_SUFFIX);
	}

	$cws = scws_open();
	scws_set_charset($cws, "utf8");
	scws_set_dict($cws, ini_get('scws.default.fpath') . '/dict.utf8.xdb');
	scws_set_rule($cws, ini_get('scws.default.fpath') . '/rules.utf8.ini');
	scws_send_text($cws, $text);

    $output=array(array());
    $case_list=array();

    $output[0]["status"]="success";
    $case_list[0]="unknown";

    $num=1;

	while ($res = scws_get_result($cws)){
		foreach ($res as $tmp){
            inquiryDB("alipay",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("business",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("mobilebanking",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("network",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("onlineshopping",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("society",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("telecom",$case_list,$output,$num,$tmp["word"],$db);
            inquiryDB("wechat",$case_list,$output,$num,$tmp["word"],$db);
		}
	}

    if($num==1){
        $output[0]["status"]="fail";
        $output[1]["msg"]="未搜索到相关结果";
    }

    echo json_encode($output);
    scws_close($cws);
?>