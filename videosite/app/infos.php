<?php
include('header.php');

$wh = ' 1=1 AND state=1';
if(!empty($_GET['id']))
{
    $wh.= ' AND CATEGORY='.$_GET['id'];
}
if(!empty($_GET['key']))
{
    $wh.= ' AND TITLE LIKE "%'.$_GET['key'].'%"';
}

$sql = 'SELECT * FROM article where '.$wh;
//echo $sql;
$infos=$db->execute_dql($sql);
$infos = udata($infos, $db);


?>



            <!-- layerslider -->



            <!-- main content -->
            <section class="content">
                <!-- newest video -->




                <div class="row secBg">

                    <div class="main-heading">
                        <div style="padding-bottom: 41px;" class=" secBg padding-14">
                            <div class="medium-8 small-8 columns">
                                <div class="head-title">
                                    <i class="fa fa-film"></i>
                                    <h4>信息中心</h4>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <p class="pull-left">All Videos : <span>
                                    <?php echo count($infos); ?>
                                    Videos posted</span></p>
                            <div class="grid-system pull-right show-for-large">
                                <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                            </div>
                        </div>
                        <div class="tabs-content" data-tabs-content="newVideos">
                            <div class="tabs-panel is-active" id="new-all">
                                <div class="row list-group">

                                    <?php
                                    if(!empty($infos))
                                    {
                                    foreach ($infos as $d1)
                                    {
                                    ?>

                                    <div class="item large-3 medium-6 columns group-item-grid-default">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="../<?php echo $d1['THUMB'];?>" >
                                                <a href="info.php?id=<?php echo $d1['ID'];?>" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>点击查看</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span><?php echo $d1['CLICKED'];?></span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span><?php echo date('m月d日',$d1['CREATED']);?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="info.php?id=<?php echo $d1['ID'];?>"><?php echo $d1['TITLE'];?>.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="#"><?php echo $d1['user'];?></a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span><?php echo date('Y年m月d日',$d1['CREATED']);?></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span><?php echo $d1['CLICKED'];?></span>
                                                    </p>
                                                </div>

                                                <div class="post-button">
                                                    <a href="info.php?id=<?php echo $d1['ID'];?>" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php }} ?>



                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </section>
<?php
include('footer.php');
?>
