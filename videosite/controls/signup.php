<?php
require_once 'include/config.inc.php';
$msg = '';
if($_POST){



    $sql = 'INSERT INTO users(cateid,realname,username,password,
 	sex,birthday,address,email,qq,tel,
 	thumb,type,
 	status,created) VALUES(1,"'.$_POST['realname'].'","'.$_POST['username'].'",
 	"'.md5($_POST['password']).'",1,
 	"'.$_POST['birthday'].'","'.$_POST['address'].'",
 	"'.$_POST['email'].'","'.$_POST['qq'].'",
 	"'.$_POST['tel'].'",
 	"'.$thumb.'",1,
 	1,'.time().');';
    if($db->execute_dml($sql)){
        $msg = "恭喜您，注册成功";
        $state=1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>用户注册</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->



<div class="wrapper pa-0" style="min-height: 1080px;">
    <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
            <a href="../">
                <img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
                <span class="brand-text">用户中心</span>
            </a>
        </div>
        <div class="form-group mb-0 pull-right">
            <span class="inline-block pr-10">已有账号？</span>
            <a class="inline-block btn btn-info btn-rounded btn-outline" href="login.php">马上登录</a>
        </div>
        <div class="clearfix"></div>
    </header>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">创建平台账号</h3>
                                    <h6 class="text-center nonecase-font txt-grey">填写账号信息</h6>
                                </div>
                                <div class="form-wrap">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">账号</label>
                                            <input type="text" name="username" class="form-control" required="" id="exampleInputEmail_2" placeholder="账号">
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">密码</label>
                                            <div class="clearfix"></div>
                                            <input type="password" name="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="密码">
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">确认密码</label>
                                            <div class="clearfix"></div>
                                            <input type="password" name="password2" class="form-control" required="" id="exampleInputpwd_2" placeholder="确认密码">
                                        </div>

                                        <div class="form-group text-center">
                                            <?php
                                            if(!empty($msg)){
                                                ?>
                                                <span class="label label-danger"><?php echo $msg;?></span>
                                                <br> <br>
                                            <?php } ?>
                                            <button type="submit" class="btn btn-info btn-rounded">下一步</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
</body>
</html>
