<?php

// 1.��ȡ�ϴ��ļ���Ϣ
$upfile = $_FILES["files"];

// �������������
// $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
$path = "./upload_video/"; //����һ���ϴ����Ŀ¼


// 2.�����ϴ��ļ��Ĵ����
if($upfile["error"] > 0){
    
    switch($upfile['error']){ // ��ȡ������Ϣ
    
    case 1:
        
        $info = "�ϴ����ļ������� php.ini��upload_max_filesize ѡ���е����ֵ.";
        
        break;
    
    case 2:
        
        $info = "�ϴ��ļ���С������html��MAX_FILE_SIZE ѡ���е����ֵ.";
        
        break;
    
    case 3:
        
        $info = "�ļ�ֻ�в��ֱ��ϴ�";
        
        break;
    
    case 4:
        
        $info = "û���ļ����ϴ�.";
        
        break;
    
    case 6:
        
        $info = "�Ҳ�����ʱ�ļ���.";
        
        break;
    
    case 7:
        
        $info = "�ļ�д��ʧ�ܣ�";
        break;
        
        }
    die(iconv("GB2312", "UTF-8", "�ϴ��ļ�����,ԭ��:" . $info));
    
    }


// 4.���͹���


// 5.�ϴ�����ļ�������(�����ȡһ���ļ���)
$fileinfo = pathinfo($upfile["name"]); //�����ϴ��ļ�����


do{
    
    $newfile = date("YmdHis") . rand(1000, 9999) . "." . $fileinfo["extension"];
    
    }while(file_exists($path . $newfile));

// 6.ִ���ļ��ϴ�
// �ж��Ƿ���һ���ϴ����ļ�
if(is_uploaded_file($upfile["tmp_name"])){
    
    // ִ���ļ��ϴ�(�ƶ��ϴ��ļ�)
    if(move_uploaded_file($upfile["tmp_name"], $path . $newfile)){
        
        echo iconv("GB2312", "UTF-8", "�ļ��ϴ��ɹ�!") ;
        
        // echo $newfile;//ȡ����ļ���
        // echo "<h3><a href='index.php'>���</a></h3>";
        }else{
        
        die(iconv("GB2312", "UTF-8", "�ϴ��ļ�ʧ�ܣ�"));
        
        }
    
    }else{
    
    die(iconv("GB2312", "UTF-8", "����һ���ϴ��ļ�!"));
    
    }
?>