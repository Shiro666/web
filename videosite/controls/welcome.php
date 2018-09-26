<?php
require_once('include/config.inc.php');
$list1 = $db->execute_dql('SELECT * from users where type=1');
$list2 = $db->execute_dql('SELECT * from users where type=3');
$list3 = $db->execute_dql('SELECT * from category');
$list4 = $db->execute_dql('SELECT * from article');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>管理中心-</title>

    <!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>

    <!-- Data table CSS -->
    <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #fff">
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-1-active pimary-color-red">
    <!-- Top Menu Items -->



            <!-- Row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-red">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($list1);?></span></span>
                                                <span class="weight-500 uppercase-font txt-light block font-13">用户数量</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-yellow">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($list2);?></span></span>
                                                <span class="weight-500 uppercase-font txt-light block">管理员</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-male-alt txt-light data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-green">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($list3);?></span></span>
                                                <span class="weight-500 uppercase-font txt-light block">栏目数</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-blue">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo $total;?></span></span>
                                                <span class="weight-500 uppercase-font txt-light block">视频数</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                                <div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

           

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">用户数据</h6>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="pull-left inline-block refresh mr-15">
                                    <i class="zmdi zmdi-replay"></i>
                                </a>
                                <a href="#" class="pull-left inline-block full-screen mr-15">
                                    <i class="zmdi zmdi-fullscreen"></i>
                                </a>
                                <div class="pull-left inline-block dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <td style="text-align: center;">用户名</td>
                                                <th>姓名</th>
                                                <td>性别</td><td>出生日期</td><td>电话</td>
                                                <td>邮箱</td>
                                                <td>联系地址</td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            if(!empty($list1)){

                                                foreach($list1 as $item){?>
                                                    <tr><td style="text-align: center;">


                                                            <a target="_blank" href="../<?php echo $item['THUMB']; ?>">
                                                                <img width="45" height="45" src="../<?php echo $item['THUMB'];?>" alt=""/>
                                                            </a>
                                                            <br>
                                                            <?php echo $item['USERNAME'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $item['REALNAME'];?>
                                                        </td>
                                                        <td> <span class="label label-primary">
                                                            <?php if($item['SEX']==0){
                                                                echo '女';
                                                            }else{ echo '男';}?>
                                                                </span>
                                                        </td>
                                                        <td>
                                                            <?php echo $item['BIRTHDAY'];?>
                                                        </td>

                                                        <td>
                                                            <?php echo $item['TEL'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $item['EMAIL'];?>
                                                        </td> <td>
                                                            <?php echo $item['ADDRESS'];?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                }} ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row -->
        </div>



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
