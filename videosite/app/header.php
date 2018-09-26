
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
        <!--header-->
        <div class="off-canvas position-left light-off-menu" id="offCanvas-responsive" data-off-canvas>
            <div class="off-menu-close">
                <h3>防诈骗中心</h3>
                <span data-toggle="offCanvas-responsive"><i class="fa fa-times"></i></span>
            </div>
            <ul class="vertical menu off-menu" data-responsive-menu="drilldown">


                <?php
                if(!empty($data))
                {
                    foreach ($data as $d)
                    {
                        ?>
                        <li class="ml_5"><a href="infos.php?id=<?php echo $d['ID'];?>"><?php echo $d['TITLE'];?></a></li>
                    <?php }
                }
                ?>


            </ul>
            <div class="responsive-search">
                <form method="get" action="infos.php">
                    <div class="input-group">
                        <input class="input-group-field" name="key" type="text" placeholder="search Here">
                        <div class="input-group-button">
                            <button type="submit" name="search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="top-button">
                <ul class="menu">


                    <?php
                    if(empty($_SESSION['login_user']))
                    {
                    ?>
                        <li>
                            <a href="../controls/signup.php">注册正式用户</a>
                        </li>
                    <li class="dropdown-login">
                        <a href="../controls/login.php">我要登录</a>
                    </li>
                    <?php }else{ ?>
                        <li>
                            <a href="../controls/index.php?page=addarticle">上传信息</a>
                        </li>
                        <li class="dropdown-login">
                            <a href="../controls/">个人中心</a>
                        </li>  </li>
                        <li class="dropdown-login">
                            <a href="../controls/quit.php">注销</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <header>
                <!-- Top -->

                <!--Navber-->
                <section id="navBar">
                    <nav class="sticky-container" data-sticky-container>
                        <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                            <div class="row">
                                <div class="large-12 columns">
                                    <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                        <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                        <div onclick="javascript:location.href='index.php';" class="title-bar-title"><img src="images/logo-small.png" alt="logo"></div>
                                    </div>

                                    <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                        <div class="top-bar-left">
                                            <ul class="menu">
                                                <li class="menu-text">
                                                    <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top-bar-right search-btn">
                                            <ul class="menu">
                                                <li class="search">
                                                    <i class="fa fa-search"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top-bar-right">
                                            <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">


                                                <?php
                                                if(!empty($data))
                                                {
                                                    foreach ($data as $d)
                                                    {
                                                        ?>
                                                        <li class="ml_5"><a href="infos.php?id=<?php echo $d['ID'];?>"><?php echo $d['TITLE'];?></a></li>
                                                    <?php }
                                                }
                                                ?>


                                                <?php
                                                if(empty($_SESSION['login_user']))
                                                {
                                                    ?>
                                                    <li>
                                                        <a href="../controls/signup.php">注册正式用户</a>
                                                    </li>
                                                    <li class="-login">
                                                        <a href="../controls/login.php">我要登录</a>
                                                    </li>
                                                <?php }else{ ?>
                                                    <li>
                                                        <a href="../controls/index.php?page=addarticle">上传诈骗信息</a>
                                                    </li>
                                                    <li class="-login">
                                                        <a href="../controls/">个人中心</a>
                                                    </li>
                                                    <li class="dropdown-login">
                                                        <a href="../controls/quit.php">注销</a>
                                                    </li>
                                                <?php } ?>



                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="search-bar" class="clearfix search-bar-light">
                                <form method="get" action="infos.php">
                                    <div class="search-input float-left">
                                        <input type="search" name="key" placeholder="Seach Here your video">
                                    </div>
                                    <div class="search-btn float-right text-right">
                                        <button class="button" name="search" type="submit">search now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </section>
            </header><!-- End Header -->


