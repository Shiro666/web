<?php

// 1.获取上传文件信息
$upfile = $_FILES["files"];

// 定义允许的类型
// $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
$path = "./upload_video/"; //定义一个上传后的目录


// 2.过滤上传文件的错误号
if($upfile["error"] > 0){
    
    switch($upfile['error']){ // 获取错误信息
    
    case 1:
        
        $info = "上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
        
        break;
    
    case 2:
        
        $info = "上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
        
        break;
    
    case 3:
        
        $info = "文件只有部分被上传";
        
        break;
    
    case 4:
        
        $info = "没有文件被上传.";
        
        break;
    
    case 6:
        
        $info = "找不到临时文件夹.";
        
        break;
    
    case 7:
        
        $info = "文件写入失败！";
        break;
        
        }
    die(iconv("GB2312", "UTF-8", "上传文件错误,原因:" . $info));
    
    }


// 4.类型过滤


// 5.上传后的文件名定义(随机获取一个文件名)
$fileinfo = pathinfo($upfile["name"]); //解析上传文件名字


do{
    
    $newfile = date("YmdHis") . rand(1000, 9999) . "." . $fileinfo["extension"];
    
    }while(file_exists($path . $newfile));

// 6.执行文件上传
// 判断是否是一个上传的文件
if(is_uploaded_file($upfile["tmp_name"])){
    
    // 执行文件上传(移动上传文件)
    if(move_uploaded_file($upfile["tmp_name"], $path . $newfile)){
        
        echo iconv("GB2312", "UTF-8", "文件上传成功!") ;
        
        // echo $newfile;//取这个文件名
        // echo "<h3><a href='index.php'>浏览</a></h3>";
        }else{
        
        die(iconv("GB2312", "UTF-8", "上传文件失败！"));
        
        }
    
    }else{
    
    die(iconv("GB2312", "UTF-8", "不是一个上传文件!"));
    
    }
?>