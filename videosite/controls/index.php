<?php
require_once('include/config.inc.php');

if(empty($_SESSION['login_user']))
{
    echo '<script>';
    echo 'location.href="login.php";';
    echo '</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>防诈骗管理中心</title>

    <!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>

    <!-- Data table CSS -->
    <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-1-active pimary-color-red">
    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="index.php">
                        <img class="brand-img" src="dist/img/logo.png" alt="brand"/>
                        <span class="brand-text">用户中心</span>
                    </a>
                </div>
            </div>
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>


        </div>
        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">

                <li class="dropdown auth-drp">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
                        <?php
                        if(!empty($_SESSION['thumb']))
                        {?>
                            <img width="43" height="43" class="user-auth-img img-circle" src="../<?php echo $_SESSION['thumb'];?>" />
                        <?php }else{
                            ?>
                            <img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
                        <?php }?>


                        <span class="user-online-status"></span></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <li>
                            <a target="mainframe" href="profile.php?id=<?php echo $_SESSION['userid'];?>"><i class="zmdi zmdi-account"></i><span>资料更新</span></a>
                        </li>
                        <li>
                            <a target="mainframe" href="password.php?id=<?php echo $_SESSION['userid'];?>"><i class="zmdi zmdi-settings"></i><span>密码设置</span></a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="quit.php"><i class="zmdi zmdi-power"></i><span>安全退出</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
            <li class="navigation-header">
                <span>操作菜单</span>
                <i class="zmdi zmdi-more"></i>
            </li>


            <li>
                <a href="../app/">
                    <i class="zmdi zmdi-home"></i>
                    平台首页
                </a>
            </li>


            <?php
            $type = $_SESSION['usertype'];
            if($type==3){
            ?>

            <li>
                <a class="" href="javascript:void(0);"
                   data-toggle="collapse" data-target="#dashboard_dr">
                    <div class="pull-left">
                        <i class="zmdi zmdi-apps mr-20"></i>
                        <span class="right-nav-text">管理员管理</span>
                    </div><div class="pull-right">
                        <i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div></a>
                <ul id="dashboard_dr" class="collapse collapse-level-1">
                    <li>
                        <a target="mainframe" class="" href="adminlist.php">管理员列表</a>
                    </li>
                    <li>
                        <a target="mainframe" class="" href="addadmin.php">新增管理员</a>
                    </li>
                </ul>
            </li>






                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr11">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">用户管理</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr11" class="collapse collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="userlist.php">用户列表</a>
                        </li>
                        <li>
                            <a target="mainframe" class="" href="adduser.php">新增用户</a>
                        </li>
                    </ul>
                </li>


                

                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr1112">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">栏目管理</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr1112" class="collapse collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="catelist.php">栏目管理</a>
                        </li>
                        <li>
                            <a target="mainframe" class="" href="addcate.php">新增栏目</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr111">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">视频管理</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr111" class="collapse collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="articlelist.php">视频列表</a>
                        </li>
                        <li>
                            <a target="mainframe" class="" href="addarticle.php">发布视频</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr1113o">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">轮播图</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr1113o" class="collapse collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="adslist.php">数据列表</a>
                        </li>
                        <li>
                            <a target="mainframe" class="" href="addads.php">新增数据</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr1113o222">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">评论管理</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr1113o222" class="collapse collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="cmtlist.php">评论管理</a>
                        </li>

                    </ul>
                </li>






            <?php } ?>

            <?php if($type==1){ ?>

                <li>
                    <a class="" href="javascript:void(0);"
                       data-toggle="collapse" data-target="#dashboard_dr1113">
                        <div class="pull-left">
                            <i class="zmdi zmdi-apps mr-20"></i>
                            <span class="right-nav-text">视频管理</span>
                        </div><div class="pull-right">
                            <i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="dashboard_dr1113" class="collapse in collapse-level-1">
                        <li>
                            <a target="mainframe" class="" href="myartlist.php">我的视频</a>
                        </li>
                        <li>
                            <a target="mainframe" class="" href="addarticle.php">上传视频</a>
                        </li>
                    </ul>
                </li>


                
            <?php } ?>


            <?php if($type==2){ ?>





            <?php } ?>


            <li>
                <a class="" href="javascript:void(0);"
                   data-toggle="collapse" data-target="#dashboard_dr11134">
                    <div class="pull-left">
                        <i class="zmdi zmdi-apps mr-20"></i>
                        <span class="right-nav-text">账号设置</span>
                    </div><div class="pull-right">
                        <i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div></a>
                <ul id="dashboard_dr11134" class="collapse in collapse-level-1">

                    <li>
                        <a target="mainframe" class="" href="profile.php?id=<?php echo $_SESSION['userid'];?>">资料设置</a>
                    </li>
                    <li>
                        <a target="mainframe" class="" href="password.php?id=<?php echo $_SESSION['userid'];?>">密码更新</a>
                    </li>

                    <li>
                        <a  class="" href="quit.php">注销登录</a>
                    </li>
                </ul>
            </li>

            <li><hr class="light-grey-hr mb-10"/></li>

        </ul>
    </div>
    <!-- /Left Sidebar Menu -->

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid pt-25" style="margin-top: 1px;">
            <!-- Row -->
            <?php
            $src = '';

                    if(!empty($_GET['page'])){
                        $src = $_GET['page'].'.php';
                    }
           else{
                $src = 'welcome.php';
            }
            ?>

            <iframe src="<?php echo $src;?>" name="mainframe" style="border: none;width: 100%;height: 100%;min-height: 980px;" frameborder="0"></iframe>
            <!-- Row -->
        </div>

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2018 &copy; All Rights Reserved</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Data table JavaScript -->
<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>

<!-- simpleWeather JavaScript -->
<script src="vendors/bower_components/moment/min/moment.min.js"></script>
<script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
<script src="dist/js/simpleweather-data.js"></script>

<!-- Progressbar Animation JavaScript -->
<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Sparkline JavaScript -->
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Owl JavaScript -->
<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

<!-- ChartJS JavaScript -->
<script src="vendors/chart.js/Chart.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendors/bower_components/raphael/raphael.min.js"></script>
<script src="vendors/bower_components/morris.js/morris.min.js"></script>
<script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

<!-- Switchery JavaScript -->
<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard-data.js"></script>
</body>

</html>
