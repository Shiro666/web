
<?php
require_once('../controls/include/config.inc.php');
$sql='SELECT * FROM category';
$data=$db->execute_dql($sql);
if(!empty($data))
{
    foreach ($data as $i=>$d)
    {
        $list = $db->execute_dql('SELECT * FROM article WHERE state=1 AND category='.$d['ID']);
        $list = udata($list, $db);
        $data[$i]['list'] = $list;
    }
}


function udata($data,$db)
{

    if(!empty($data))
    {
        foreach ($data as $i=>$item) {
            $obj = $db->execute_dql('SELECT * FROM category WHERE id='.$item['CATEGORY']);
            $obj = $obj[0];
            $data[$i]['CATEGORY'] = $obj['TITLE'];

            $obj = $db->execute_dql('SELECT * FROM users WHERE id='.$item['userid']);
            $obj = $obj[0];
            $data[$i]['user'] = $obj['USERNAME'];
        }

    }
    return $data;
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>防诈骗中心</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="layerslider/css/layerslider.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="../../html/css/reset.min.css">
    <link rel="stylesheet" href="../../html/css/text.min.css">
    <link rel="stylesheet" href="../../html/css/960_16_col.min.css">
    <link rel="stylesheet" href="../../html/css/color.min.css">
    <link rel="stylesheet" href="../../html/css/layout.min.css">
    <link rel="stylesheet" href="../../html/css/typography.min.css">
</head>
<body>
    <script type="text/javascript" src="../../html/scripts/WebP.js"></script>
    
    <div class="container_16 clearfix lo">
        <div class="grid_16 login_register">
            <span id="Aprf1"></span>
            <span id="Aprf2"><a id="login_button" onclick="showDialog()" href="javascript:;">[登录]</a><a href="../../html/REGISTER.html">&nbsp;&nbsp;&nbsp;&nbsp;[注册]</a> </span>
        </div>
        <div id="header" class="grid_16">
            <img src="../../html/images/banner.jpg">
            <div id="nav">
                <ul>
                    <li class="nav_content"><a href="../../html/HOME.html">&nbsp;&nbsp;&nbsp;&nbsp;首页</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=1">支付宝诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=2">商业诈骗</a> </li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=3">手机银行诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=4">网络诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=5">网购诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=6">社会诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=7">电信诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/ANLI_LIST.html?case_type=8">微信诈骗</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/BBS.html?post_type=0">网页论坛</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="index.php">视频天地</a></li>
                    <li class="mid">|</li>
                    <li class="nav_content"><a href="../../html/SEARCH.html">检索</a></li>
                    <li class="mid">|</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="off-canvas-content" data-off-canvas-content>