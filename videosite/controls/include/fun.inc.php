<?php
/*
*公共函数库
**/
if (!function_exists('post')) {
    //接收POST表单值
    function post($key)
    {
        return $_POST[$key] ? $_POST[$key] : null;
    }
}
function todate($time)
{
    return date('Y/m/d H:i:s',$time);
}

function db_dump($path,$host,$user,$pwd,$db) {
    $mysqlconlink = mysql_connect($host,$user,$pwd , true);
    if (!$mysqlconlink)
        echo sprintf('No MySQL connection: %s',mysql_error())."<br/>";
    mysql_set_charset( 'utf8', $mysqlconlink );
    $mysqldblink = mysql_select_db($db,$mysqlconlink);
    if (!$mysqldblink)
        echo sprintf('No MySQL connection to database: %s',mysql_error())."<br/>";
    $tabelstobackup=array();
    $result=mysql_query("SHOW TABLES FROM `$db`");
    if (!$result)
        echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW TABLE STATUS FROM `$db`;")."<br/>";
    while ($data = mysql_fetch_row($result)) {
        $tabelstobackup[]=$data[0];
    }
    if (count($tabelstobackup)>0) {
        $result=mysql_query("SHOW TABLE STATUS FROM `$db`");
        if (!$result)
            echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW TABLE STATUS FROM `$db`;")."<br/>";
        while ($data = mysql_fetch_assoc($result)) {
            $status[$data['Name']]=$data;
        }
        if ($file = fopen($path, 'wb')) {
            fwrite($file, "-- ---------------------------------------------------------\n");
            fwrite($file, "-- Database Name: $db\n");
            fwrite($file, "-- ---------------------------------------------------------\n\n");
            fwrite($file, "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n");
            fwrite($file, "/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n");
            fwrite($file, "/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n");
            fwrite($file, "/*!40101 SET NAMES '".mysql_client_encoding()."' */;\n");
            fwrite($file, "/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;\n");
            fwrite($file, "/*!40103 SET TIME_ZONE='".mysql_result(mysql_query("SELECT @@time_zone"),0)."' */;\n");
            fwrite($file, "/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;\n");
            fwrite($file, "/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;\n");
            fwrite($file, "/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;\n");
            fwrite($file, "/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;\n\n");
            foreach($tabelstobackup as $table) {
               // echo sprintf('Dump database table "%s"',$table)."<br/>";
                need_free_memory(($status[$table]['Data_length']+$status[$table]['Index_length'])*3);
                _db_dump_table($table,$status[$table],$file);
            }
            fwrite($file, "\n");
            fwrite($file, "/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;\n");
            fwrite($file, "/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;\n");
            fwrite($file, "/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;\n");
            fwrite($file, "/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;\n");
            fwrite($file, "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n");
            fwrite($file, "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n");
            fwrite($file, "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n");
            fwrite($file, "/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;\n");
            fclose($file);
           // echo 'Database dump done!'."<br/>";
        } else {
            echo 'Can not create database dump!'."<br/>";
        }
    } else {
        echo 'No tables to dump'."<br/>";
    }
}
function _db_dump_table($table,$status,$file) {
    fwrite($file, "\n");
    fwrite($file, "--\n");
    fwrite($file, "-- Table structure for table $table\n");
    fwrite($file, "--\n\n");
    fwrite($file, "DROP TABLE IF EXISTS `" . $table .  "`;\n");
    fwrite($file, "/*!40101 SET @saved_cs_client     = @@character_set_client */;\n");
    fwrite($file, "/*!40101 SET character_set_client = '".mysql_client_encoding()."' */;\n");
    $result=mysql_query("SHOW CREATE TABLE `".$table."`");
    if (!$result) {
        echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW CREATE TABLE `".$table."`")."<br/>";
        return false;
    }
    $tablestruc=mysql_fetch_assoc($result);
    fwrite($file, $tablestruc['Create Table'].";\n");
    fwrite($file, "/*!40101 SET character_set_client = @saved_cs_client */;\n");
    $result=mysql_query("SELECT * FROM `".$table."`");
    if (!$result) {
        echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SELECT * FROM `".$table."`")."<br/>";
        return false;
    }
    fwrite($file, "--\n");
    fwrite($file, "-- Dumping data for table $table\n");
    fwrite($file, "--\n\n");
    if ($status['Engine']=='MyISAM')
        fwrite($file, "/*!40000 ALTER TABLE `".$table."` DISABLE KEYS */;\n");
    while ($data = mysql_fetch_assoc($result)) {
        $keys = array();
        $values = array();
        foreach($data as $key => $value) {
            if($value === NULL)
                $value = "NULL";
            elseif($value === "" or $value === false)
                $value = "''";
            elseif(!is_numeric($value))
                $value = "'".mysql_real_escape_string($value)."'";
            $values[] = $value;
        }
        fwrite($file, "INSERT INTO `".$table."` VALUES ( ".implode(", ",$values)." );\n");
    }
    if ($status['Engine']=='MyISAM')
        fwrite($file, "/*!40000 ALTER TABLE ".$table." ENABLE KEYS */;\n");
}
function need_free_memory($memneed) {
    if (!function_exists('memory_get_usage'))
        return;
    $needmemory=@memory_get_usage(true)+inbytes($memneed);
    if ($needmemory>inbytes(ini_get('memory_limit'))) {
        $newmemory=round($needmemory/1024/1024)+1 .'M';
        if ($needmemory>=1073741824)
            $newmemory=round($needmemory/1024/1024/1024) .'G';
        if ($oldmem=@ini_set('memory_limit', $newmemory))
            echo sprintf(__('Memory increased from %1$s to %2$s','backwpup'),$oldmem,@ini_get('memory_limit'))."<br/>";
        else
            echo sprintf(__('Can not increase memory limit is %1$s','backwpup'),@ini_get('memory_limit'))."<br/>";
    }
}
function inbytes($value) {
    $multi=strtoupper(substr(trim($value),-1));
    $bytes=abs(intval(trim($value)));
    if ($multi=='G')
        $bytes=$bytes*1024*1024*1024;
    if ($multi=='M')
        $bytes=$bytes*1024*1024;
    if ($multi=='K')
        $bytes=$bytes*1024;
    return $bytes;
}

function send_mail($host,$port,$username,$password,$from,$subject,$to,$content)
{

    require_once('class.phpmailer.php');
    include_once("class.smtp.php");
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    try {
        $mail->CharSet ="utf8";
        $mail->Host       = $host;
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth   = true;
        $mail->Port       = $port;
        //$mail->SMTPSecure = "ssl";

        $mail->Username   = $username;
        $mail->Password   = $password;
        $mail->AddReplyTo($from, '回复');
        $mail->AddAddress($to,$to);
        $mail->SetFrom($from, '小熊猫科技');
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        $mail->Body = $content;
       return $mail->Send();
    } catch (phpmailerException $e) {
        echo $e->errorMessage();
        return false;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    return false;
}

function generate_pwd()
{
    $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
    $pwd = '';
    for($i=0;$i<6;$i++)
    {
        $pwd.=$arr[rand(0,count($arr))];
    }
    return strlen($pwd)>5?$pwd:generate_pwd();
}

function generate_uuid()
{
    $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $arr2 = array(0,1,2,3,4,5,6,7,8,9);
    $astr = '';
    $bstr = '';
    for($i=0;$i<5;$i++)
    {
        $astr.=$arr[rand(0,count($arr)-1)];
    }
    for($j=0;$j<5;$j++)
    {
        $bstr.=$arr2[rand(0,count($arr2)-1)];
    }
    return $astr.$bstr;
    //return (strlen($astr.$bstr)==10)?$astr.$bstr:generate_uuid();
}

//获取IP地址
function get_ip()
{
    global $_SERVER;
    if ($_SERVER) {
        if ($_SERVER[HTTP_X_FORWARDED_FOR])
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        else if ($_SERVER["HTTP_CLIENT_ip"])
            $realip = $_SERVER["HTTP_CLIENT_ip"];
        else
            $realip = $_SERVER["REMOTE_ADDR"];
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR'))
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_CLIENT_ip'))
            $realip = getenv('HTTP_CLIENT_ip');
        else
            $realip = getenv('REMOTE_ADDR');
    }
    return $realip;
}


function writeover($filename, $data, $method = "rb+")
{
    @touch($filename);
    if ($handle = @fopen($filename, $method)) {
        flock($handle, LOCK_EX);
        fputs($handle, $data);
        if ($method == "rb+") ftruncate($handle, strlen($data));
        fclose($handle);
    }
}

function redirect($url)
{
    echo '<script>
    location.href = "'.$url.'";
    </script>';
}

function decodeUnicode($str)
{
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
        create_function(
            '$matches',
            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
        ),
        $str);
}

function kb2mb($in)
{
    return round($in/(1024*1024),2);
}

function checkExt($ext)
{
    return 1;
}


function getExt($fileName)
{
    //$array = explode('.',$fileName);
    return substr(strrchr($fileName, '.'), 1);
}

?>