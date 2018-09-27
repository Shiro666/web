<?php
include('header.php');
$sql='SELECT * FROM article where id='.$_GET['id'];
$info=$db->execute_dql($sql);
$info = $info[0];


$sql = 'SELECT * FROM users WHERE ID='.$info['userid'];
$user = $db->execute_dql($sql);
$user = $user[0];


$rank=$db->execute_dql('SELECT * FROM article ORDER BY clicked DESC limit 8');
$rank = udata($rank, $db);

$db->execute_dml('UPDATE article SET CLICKED=CLICKED+1 where id='.$_GET['id']);




$sql = 'SELECT * FROM comment WHERE type=1 and mid='.$_GET['id'].' ORDER BY CREATED DESC';
$cs = $db->execute_dql($sql);

if(!empty($cs)){
    foreach($cs as $i=>$c)
    {
        $sql = 'SELECT * FROM users WHERE id='.$c['uid'];

        $u = $db->execute_dql($sql);
        $cs[$i]['user'] = $u[0];
    }
}


if($_POST)
{
    if(empty($_SESSION['username']))
    {
        echo '<script>';
        echo 'alert("please login");';
        echo 'window.history.back(-1);';
        echo '</script>';
        exit;
    }
    $sql = 'INSERT INTO comment(mid,type,subject,uid,content,created) VALUES("'.$_POST['id'].'",1,
	"'.$_POST['subject'].'","'.$_SESSION['userid'].'","'.str_replace('"','' ,$_POST['content']).'",'.time().');';
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("post success!~");';
    echo 'window.history.back(-1);';
    echo '</script>';
    exit;
}
?>



            <!-- layerslider -->



            <!-- main content -->
            <section class="content">
                <!-- newest video -->




                <div class="row vedio-content">
                    <!-- left side content area -->
                    <div class="large-8 columns left-vedio-content">
                        <!--single inner video-->
                        <section class="inner-video">
                            <div class="row secBg">
                                <div class="large-12 columns inner-flex-video">
                                    <div class="flex-video widescreen">
                                        <?php echo $info['VIDEO'];?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- single post stats -->
                        <section class="SinglePostStats">
                            <!-- newest video -->
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="media-object stack-for-small">

                                        <div class="media-object-section object-second">
                                            <div class="author-des clearfix">
                                                <div class="post-title">
                                                    <h4><?php echo $info['TITLE'];?>.</h4>
                                                    <p>
                                                        <span><i class="fa fa-user"></i>
                                                            <?php echo $user['USERNAME'];?></span>
                                                        <span><i class="fa fa-eye"></i> <?php echo $info['CLICKED'];?></span>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="social-share">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section><!-- End single post stats -->

                        <!-- single post description -->
                        <section class="singlePostDescription">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="heading">
                                        <h5>简介</h5>
                                    </div>
                                    <div class="description showmore_one"><div class="showmore_content" style="height: 165px;">

                                            <?php echo $info['DESCRIPTION'];?>
                                            </div>

                                </div>
                            </div>

                                <div class="row secBg">
                                    <div class="large-12 columns">
                                        <div class="heading">
                                            <h5>详细内容</h5>
                                        </div>
                                        <div class="description showmore_one"><div class="showmore_content" style="height: 165px;">

                                                <?php echo $info['CONTENT'];?>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row secBg">

                                        <div class="cmt">
                                            <div class="shop-detail xzt-wp box white-pink">



                                                <div class="ylcon " style="padding: 30px;">
                                                    <p class="tit">
                                                        <h2> 用户评论</h2>
                                                    </p>
                                                    <div id="messDivId">

                                                        <?php
                                                        if(!empty($cs))
                                                        {
                                                            foreach ($cs as $c)
                                                            { ?>

                                                                <div class="story" style="border-bottom:1px solid #ddd;margin-bottom: 10px; ">

                                                                    <div class="opbtn"></div>
                                                                    <p class="story_t">
                                                                        主题：<?php echo $c['subject'];?>
                                                                        由<?php echo $c['user']['USERNAME'];?>发布于<?php echo date('Y/m/d H:i:s',$c['created']);?></p>
                                                                    <p class="story_hf"><?php echo html_entity_decode($c['content']);?></p>
                                                                </div>

                                                            <?php }
                                                        }
                                                        ?>



                                                    </div>
                                                </div>





                                                <?php
                                                if(!empty($_SESSION['username']))
                                                {
                                                    if(1==1){
                                                        ?>

                                                        <form style="width: 100%;padding: 15px;" action="" method="post" class="STYLE-NAME">
                                                            <h1 style="margin-top: 45px;font-weight: bold;font-size: 25px;">
                                                                <span>发布评论.</span>
                                                            </h1>
                                                            <label>
                                                                <input type="hidden" name="id" value="<?php echo $info['ID'];?>">
                                                                <span style="width: auto;text-align: left;">主题:</span>

                                                                <input  type="text" name="subject" placeholder="" required />
                                                            </label>

                                                            <label>
                                                                <span style="width: auto;text-align: left;">内容 :</span>
                                                                <textarea rows="5" id="message" name="content" placeholder=""></textarea>
                                                            </label>
                                                            <label>
                                                                <span>&nbsp;</span>
                                                                <input type="submit" class="button" value="提交" />
                                                            </label>
                                                        </form>

                                                    <?php } }?>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                    </div>

                        </section><!-- End single post description -->

                        <!-- related Posts -->

                        <!-- Comments -->

                    </div><!-- end left side content area -->
                    <!-- sidebar -->
                    <div class="large-4 columns">
                        <aside class="secBg sidebar">
                            <div class="row">
                                <!-- most view Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>推荐信息</h5>
                                        </div>
                                        <div class="widgetContent">


                                            <?php
                                            if(!empty($rank))
                                            {
                                            foreach ($rank as $i=>$d)
                                            {
                                            ?>

                                            <div class="video-box thumb-border">
                                                <div class="video-img-thumb">
                                                    <img src="../<?php echo $d['THUMB'];?>" alt="most viewed videos">
                                                    <a href="info.php?id=<?php echo $d['ID'];?>" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>点击播放</span>
                                                    </a>
                                                </div>
                                                <div class="video-box-content">
                                                    <h6><a href="info.php?id=<?php echo $d['ID'];?>"><?php echo $d['TITLE'];?>. </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="#"><?php echo $d['user'];?></a></span>
                                                        <span><i class="fa fa-clock-o"></i><?php echo date('Y/m/d H:i:s',$d['CREATED']);?></span>
                                                        <span><i class="fa fa-eye"></i><?php echo $d['CLICKED'];?></span>
                                                    </p>
                                                </div>
                                            </div>

                                            <?php }} ?>





                                        </div>
                                    </div>
                                </div><!-- end most view Widget -->



                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>



            </section>
<?php
include('footer.php');
?>
<script src="../controls/assets/js/kindeditor-4.1.10/kindeditor-min.js"></script>
<script>
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('textarea[name="content"]', {
            uploadJson: '../controls/assets/js/kindeditor-4.1.10/php/upload_json.php',
            fileManagerJson: '../controls/assets/js/kindeditor-4.1.10/php/file_manager_json.php',
            allowFileManager: true,
            items : ['source',
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link','fullscreen'],
            afterBlur: function () {
                this.sync();
            }
        });
    });

</script>
