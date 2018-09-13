/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200){
        responseObject=JSON.parse(xhr.responseText);
        var str1='';
        var str2='';
        str1=responseObject.video_play[0].path;
        str2=responseObject.video_play[0].poster;
        var player = videojs("example_video_1", {
            "controls": true,
            "autoplay": false,
            "preload": "auto",
            "loop": false,
            controlBar: {
                captionsButton: false,
                chaptersButton: false,
                playbackRateMenuButton: true,
                LiveDisplay: true,
                subtitlesButton: false,
                remainingTimeDisplay: true,
                progressControl: true,

                volumeMenuButton: {
                    inline: false,
                    vertical: true
                },//竖着的音量条
                fullscreenToggle: true
            }
        },function(){
            player.src(str1);
            videoPlater.poster(str2)
        });
    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/

var url =window.location.href;
var argsIndex = url.split("?video_id=");
var arg=argsIndex[1];
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    url:'play_video.php',
    data:{'video_id':arg},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var str1='';
        var str2='';
        str1=data.video_address;
        str2=data.poster_address;
        var player = videojs("example_video_1", {
            "controls": true,
            "autoplay": false,
            "preload": "auto",
            "loop": false,
            controlBar: {
                captionsButton: false,
                chaptersButton: false,
                playbackRateMenuButton: true,
                LiveDisplay: true,
                subtitlesButton: false,
                remainingTimeDisplay: true,
                progressControl: true,

                volumeMenuButton: {
                    inline: false,
                    vertical: true
                },//竖着的音量条
                fullscreenToggle: true
            }
        },function(){
            player.src(str1);
            videoPlater.poster(str2)
        });

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