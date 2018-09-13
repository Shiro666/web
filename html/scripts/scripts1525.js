;(function($){
    $.fn.carousel = function(param){
        var carousel = param.carousel;
        var list = $(carousel).children("li");
        var indexContainer = param.indexContainer;
        var prev = param.prev;
        var next = param.next;
        var timing = param.timing;
        var animateTime = param.animateTime;
        var auto = param.auto;
        var timer;
        for(var i = 1;i <= list.length;i++){
            $(indexContainer).append("<li>"+i+"</li>")
        }
        var indexList = $(indexContainer).children("li");
        $(list[0]).addClass("on").fadeIn(animateTime);
        $(indexList[0]).addClass("index")
        if(auto){
            startTiming();
            /*鼠标进入停止计时，离开开始计时*/
            $(carousel+","+prev+","+next+","+indexContainer).hover(function(){
                window.clearInterval(timer);
            },function(){
                startTiming();
            });
        }

        /*开始计时方法*/
        function startTiming(){
            timer = window.setInterval("$.switchImg();",timing);
        };

        $(prev).off("click").on("click",function(){
            var on = $(carousel).children(".on");
            on.stop(true,true).fadeOut(animateTime).removeClass("on");
            if(on.prev().is("li")){
                $.switchIndex($(carousel).children("li").index(on.prev()));
                on.prev().stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }else{
                $.switchIndex($(carousel).children("li").index(list[list.length-1]));
                $(list[list.length-1]).stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }

        });
        $(next).off("click").on("click",function(){
            var on = $(carousel).children(".on");
            on.stop(true,true).fadeOut(animateTime).removeClass("on");
            if(on.next().is("li")){
                $.switchIndex($(carousel).children("li").index(on.next()));
                on.next().stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }else{
                $.switchIndex($(carousel).children("li").index(list[0]));
                $(list[0]).stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }
        });

        $(indexList).off("click").on("click",function(){
            if ($(this).attr("class") != "index") {
                var on = $(carousel).children(".on");
                var index = $(this).index();
                console.log(index);
                $(indexList).removeClass("index");
                $(indexList[index]).addClass("index");
                on.stop(true,true).fadeOut(animateTime).removeClass("on");
                $(list[index]).stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }
        });

        /*切换当前索引*/
        $.extend({switchIndex:function(index){
            $(indexList).removeClass("index");
            $(indexList[index]).addClass("index");
        }});

        /*定时切换图片*/
        $.extend({switchImg:function(){
            var on = $(carousel).children(".on");
            on.stop(true,true).fadeOut(animateTime).removeClass("on");
            if(on.next().is("li")){
                $.switchIndex($(carousel).children("li").index(on.next()));
                on.next().stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }else{
                $.switchIndex($(carousel).children("li").index(list[0]));
                $(list[0]).stop(true,true).addClass("on").delay(animateTime/2).fadeIn(animateTime);
            }
        }});
    }
})(jQuery);



$(".carousel-content").carousel({
    carousel : ".carousel",//轮播图容器
    indexContainer : ".img_index",//下标容器
    prev : ".img_pre",//左按钮
    next : ".img_next",//右按钮
    timing : 5000,//自动播放间隔
    animateTime : 800,//动画时间
    auto : true,//是否自动播放
});

$(".img_pre").hover(function(){
    $(this).find("img").attr("src","images/left_btn2.jpg");
},function(){
    $(this).find("img").attr("src","images/left_btn1.jpg");
});
$(".img_next").hover(function(){
    $(this).find("img").attr("src","images/right_btn2.jpg");
},function(){
    $(this).find("img").attr("src","images/right_btn1.jpg");
});

/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200) {
        responseObject = JSON.parse(xhr.responseText);
        var anewContent = "";

        for (var i = 0; i < responseObject.home_content.length; i++) {
            anewContent +='<div class="sub_title">电信诈骗</div><div class="topic"><img class="topicimg" src="'+responseObject.home_content[i].row1_pic+'"><a class="topica" href="#">'+responseObject.home_content[i].row1_title+'</a>'
            +responseObject.home_content[i].row1_content+'</div><ul class="under_topic"><li class="under_topicli"><span class="under_topiclispan">'+responseObject.home_content[i].row2_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row2_title+'</a></li><li class="under_topicli"><span class="under_topiclispan">'
            +responseObject.home_content[i].row3_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row3_title+'</a></li><li class="under_topicli"><span class="under_topiclispan">'
            +responseObject.home_content[i].row4_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row4_title+'</a></li><li class="under_topicli"><span class="under_topiclispan">'
            +responseObject.home_content[i].row5_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row5_title+'</a></li><li class="under_topicli"><span class="under_topiclispan">'
            +responseObject.home_content[i].row6_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row6_title+'</a></li><li class="under_topicli"><span class="under_topiclispan">'
            +responseObject.home_content[i].row7_date+'</span>·<a class="under_topiclia" href="#">'+responseObject.home_content[i].row7_title+'</a></li></ul><span class="more"><a class="morea" href="#">更多>></a> </span>';
        }
        $("#column1").html(anewContent);
        $("#column2").html(anewContent);
        $("#column3").html(anewContent);
        $("#column4").html(anewContent);
        $("#column5").html(anewContent);
        $("#column6").html(anewContent);

    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/
//以下结构需要多个
function checkWebp() {
    try{
        return (document.createElement('canvas').toDataURL('image/webp').indexOf('data:image/webp') == 0);
    }catch(err) {
        return  false;
    }
};
var support=checkWebp();
$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get1.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var anewContent = '<div class="sub_title">支付宝诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
        +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            anewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        anewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){anewContent=anewContent.replace("webp","jpg");};
        $("#column1").html(anewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});
$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get2.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var bnewContent = '<div class="sub_title">商业诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            bnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        bnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){bnewContent=bnewContent.replace("webp","jpg");};
        $("#column2").html(bnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get3.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var cnewContent = '<div class="sub_title">手机银行诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            cnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        cnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){cnewContent=cnewContent.replace("webp","jpg");};

        $("#column3").html(cnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get4.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var dnewContent = '<div class="sub_title">网络诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            dnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        dnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){dnewContent=dnewContent.replace("webp","jpg");};
        $("#column4").html(dnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get5.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var enewContent = '<div class="sub_title">网购诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            enewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        enewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){enewContent=enewContent.replace("webp","jpg");};
        $("#column5").html(enewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get6.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var fnewContent = '<div class="sub_title">社会诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            fnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        fnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){fnewContent=fnewContent.replace("webp","jpg");};
        $("#column6").html(fnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get7.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var gnewContent = '<div class="sub_title">电信诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            gnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        gnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){gnewContent=gnewContent.replace("webp","jpg");};
        $("#column7").html(gnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'GET',  //POST,GET必须大写
    url:'home_msg_get8.php',//看一下localhost是否飞、非加不可
    async:false,
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var hnewContent = '<div class="sub_title">微信诈骗</div><div class="topic"><img class="topicimg" src="'+data[0]['pic']+'"><a class="topica" href="ANLI_SHOW.html?case_id='+data[0]['case_id']+'">'+data[0]['title']+'</a>'
            +data[0]['content']+'</div><ul class="under_topic">';

        for (var i = 1; i < data.length; i++) {
            hnewContent +='<li class="under_topicli"><span class="under_topiclispan">'+data[i]['date']+'</span>·<a class="under_topiclia" href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'">'+data[i]['title']+'</a></li>';
        }
        hnewContent+='</ul><span class="more"><a class="morea" href="ANLI_LIST.html?case_type='+'1'+'">更多>></a> </span>';//ANLI_LIST.html
        if(!support){hnewContent=hnewContent.replace("webp","jpg");};
        $("#column8").html(hnewContent);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
        // 状态码
        //console.log(XMLHttpRequest.status);
        // 状态
        //console.log(XMLHttpRequest.readyState);
        // 错误信息
        //console.log(textStatus);
        alert("状态码："+XMLHttpRequest.status+" 状态："+XMLHttpRequest.readyState+" 错误信息："+textStatus);
    }
});
