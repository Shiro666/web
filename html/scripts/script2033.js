window.onload = function(){
    var turl =window.location.href;
    var argsIndex = turl.split("?video_id=");
    var arg=argsIndex[1];
    var video = document.getElementById("video");
    var lis = document.getElementsByClassName("video_li");
    var vLen = lis.length; // 播放列表的长度
    var url = [];
    var ctrl = document.getElementById("videolist_hidden");
    var ctrl_show = document.getElementById('videolist_show');
    var aside = document.getElementById("video_list");
    var curr = 1; // 当前播放的视频


    //收起播放列表
    ctrl.onclick = function(){
        aside.style.transition = "1s";
        aside.style.transform = "translateX(-10vw)";
        setTimeout(function(){
            aside.style.display = "none";
            ctrl_show.style.visibility= 'visible';
        },"0");
        video.setAttribute("width","940px");
    }

    //展开播放列表
    ctrl_show.onclick = function(){
        aside.style.display = "block";
        ctrl_show.style.visibility= 'hidden';
        setTimeout(function(){
            aside.style.transform = "translateX(0vw)";
        },"0");
        video.setAttribute("width","740px");
    }

    $.ajax({
        type:'POST',  //POST,GET必须大写
        async:false,
        url:'play_video.php',
        data:{'video_id':arg},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            //alert(decodeURI(data.video_address));
            video.setAttribute("src",decodeURI(data.video_address));
            video.setAttribute('autoplay','autoplay');

            video.pause();
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
    $.ajax({
        type:'GET',  //POST,GET必须大写
        async:false,
        url:'video_recommend.php',
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            var str="";
            for(var i=0;i<data.length;i++) {
                str += '<li class="video_li" title="'+data[i]['title']+'" value="'+data[i]['video_id']+'" >'+data[i]['title']+'</li>';
            }
            $("#videolist_ul").html(str);
            $("#videolist_ul").on("click","li",function () {
                window.location="TEST.html?video_id="+this.value;
            })
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
    video.onclick=function () {
        if(video.paused){
            video.play();
        }else{
            video.pause();
        }
    }
    video.ondblclick=function () {

        if (video.requestFullscreen) {
            video.requestFullscreen();
        }
//FireFox
        else if (video.mozRequestFullScreen) {
            video.mozRequestFullScreen();
        }
//Chrome等
        else if (video.webkitRequestFullScreen) {
            video.webkitRequestFullScreen();
        }
//IE11
        else if (video.msRequestFullscreen) {
            video.msRequestFullscreen();
        }
        else if (video.exitFullscreen) {
            video.exitFullscreen();
        }
        else if (video.mozCancelFullScreen) {
            video.mozCancelFullScreen();
        }
        else if (video.webkitCancelFullScreen) {
            video.webkitCancelFullScreen();
        }
        else if (video.msExitFullscreen) {
            video.msExitFullscreen();
        }
    }

}
