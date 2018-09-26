<?php
include('header.php');
$sql='SELECT * FROM ads';
$adsdata=$db->execute_dql($sql);



$rank=$db->execute_dql('SELECT * FROM article where state=1 ORDER BY clicked DESC limit 8');
$rank = udata($rank, $db);
//var_dump($data[1]);

?>



            <!-- layerslider -->
            <section id="slider">
                <div id="full-slider-wrapper">
                    <div id="layerslider" style="width:100%;height:500px;">

                        <?php
                        if(!empty($adsdata))
                        {
                        foreach ($adsdata as $i=>$d)
                        {
                        ?>



                        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                            <img src="../<?php echo $d['IMAGE_URL'];?>" class="ls-bg" alt="Slide background"/>
                            <h3 class="ls-l" style="left:50px; top:135px; padding: 15px; color: #444444;font-size: 24px;font-family: 'Open Sans'; font-weight: bold; text-transform: uppercase;" data-ls="offsetxin:0;durationin:2500;delayin:500;durationout:750;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotateout:-90;transformoriginout:left bottom 0;">
                                <?php echo $d['TITLE'];?></h3>
                            <h1 class="ls-l" style="left: 63px; top:185px;background: #e96969;padding:0 10px; opacity: 1; color: #ffffff; font-size: 36px; font-family: 'Open Sans'; text-transform: uppercase; font-weight: bold;" data-ls="offsetxin:left;durationin:3000; delayin:800;durationout:850;rotatexin:90;rotatexout:-90;">
                                <?php echo $d['INTRO'];?>
                            </h1>

                            <a href="<?php echo $d['LINK_URL'];?>" target="_blank" class="ls-l button" style="border-radius:4px;text-align:center;left:63px; top:315px;background: #444;color: #ffffff;font-family: 'Open Sans';font-size: 14px;display: inline-block; text-transform: uppercase; font-weight: bold;" data-ls="durationout:850;offsetxin:90;offsetxout:-90;duration:4200;fadein:true;fadeout:true;">
                                点击查看</a>

                            <img class="ls-l ls-linkto-2" style="top:400px;left:50%;white-space: nowrap;" data-ls="offsetxin:-50;delayin:1000;rotatein:-40;offsetxout:-50;rotateout:-40;" src="images/sliderimages/left.png" alt="">
                            <img class="ls-l ls-linkto-2" style="top:400px;left:52%;white-space: nowrap;" data-ls="offsetxin:50;delayin:1000;offsetxout:50;" src="images/sliderimages/right.png" alt="">
                        </div>

                        <?php }} ?>


                    </div>
                </div>
            </section><!--end slider-->

            <!-- Premium Videos -->
            <section id="premium">
                <div class="row">
                    <div class="heading clearfix">
                        <div class="large-11 columns">
                            <h4><i class="fa fa-play-circle-o"></i>热门视频</h4>
                        </div>
                        <div class="large-1 columns">
                            <div class="navText show-for-large">
                                <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-responsive-small="1" data-responsive-medium="2" data-responsive-xlarge="2">

                    <?php
                    if(!empty($rank))
                    {
                    foreach ($rank as $i=>$d)
                    {
                    ?>

                    <div style="height:250px;" onclick="javascript:location.href='info.php?id=<?php echo $d['ID'];?>';" class="large-3 medium-6 columns">
                        <figure class="premium-img">
                            <img style="height:150px;" src="../<?php echo $d['THUMB'];?>" alt="carousel">
                            <figcaption>
                                <h5><?php echo $d['TITLE'];?></h5>
                                <p><?php echo $d['CATEGORY'];?></p>
                            </figcaption>
                        </figure>
                        <a href="info.php?id=<?php echo $d['ID'];?>" class="hover-posts">
                            <span><i class="fa fa-play"></i>点击播放</span>
                        </a>
                    </div>

                    <?php }}?>

                </div>
            </section><!-- End Premium Videos -->


            <!-- main content -->
            <section class="content">
                <!-- newest video -->



                <?php
                if(!empty($data))
                {
                foreach ($data as $d)
                {
                ?>
                <div class="row secBg">

                    <div class="main-heading">
                        <div style="padding-bottom: 41px;" class=" secBg padding-14">
                            <div class="medium-8 small-8 columns">
                                <div class="head-title">
                                    <i class="fa fa-film"></i>
                                    <h4><?php echo $d['TITLE'];?></h4>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <p class="pull-left">All Videos : <span>
                                    <?php echo count($d['list']); ?>
                                    Videos posted</span></p>
                            <div class="grid-system pull-right show-for-large">
                                <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                            </div>
                        </div>
                        <div class="tabs-content" data-tabs-content="newVideos">
                            <div class="tabs-panel is-active" id="new-all">
                                <div class="row list-group">

                                    <?php
                                    if(!empty($d['list']))
                                    {
                                    foreach ($d['list'] as $d1)
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
                        <div class="text-center row-btn">
                            <a class="button radius" href="infos.php?id=<?php echo $d['ID'];?>">View All</a>
                        </div>
                    </div>
                </div>

                <?php }} ?>

            </section>
<?php
include('footer.php');
?>
