<?php
//$imgInfo = $_FILES['FileName'];
//$oldname = $imgInfo['name'];
//$tmp_name = $imgInfo['tmp_name'];
//$temp = explode(".",$oldname);
//$newname = time().".".$temp[count($temp)-1];
//move_uploaded_file($tmp_name,'upload/'.$newname);
//$dir = "http://localhost/upload/".$newname;
//echo $dir;
        function mkdirs($dir, $mode = 0777){
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    } 
    $savename = date('YmdHis',time()).mt_rand(0,9999).'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式
    $imgdirs = "upload_img/".date('Y-m-d',time()).'/';
    mkdirs($imgdirs);
    $fileName = $_FILES["file"]["name"];
    $savepath = 'upload_img/'.date('Y-m-d' ,time()).'/'.$savename; 
    // $data['errno'] = 0;
    $data['data'] = './html/'.$savepath; //文件图片绝对路径
    move_uploaded_file($_FILES["file"]["tmp_name"],$savepath);
	print_r(json_encode($data));//传回图片路径
?>