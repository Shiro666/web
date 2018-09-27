
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
</head>
<body>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas-content" data-off-canvas-content>
            
