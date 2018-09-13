var url = decodeURI(window.location.href);
var argsIndex = url.split("?user_id=");
var user_id=argsIndex[1];
var url_str="MODIFY.html?user_id="+user_id;
$("#modify_btn").attr("href",url_str);
$("#modify_btn").hide();
if(($("#Aprf1").is(':visible'))&&($.cookie('user_id')==user_id)){
    $("#modify_btn").show();
}
$.ajax({
    type:'POST',  //POST,GET必须大写之后GET改POST
    url:'user_info_detail_get.php',
    async:false,
    data:{'user_id':user_id},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var ss='';
        ss+='<img src="'+data[0]['pro_pic_path']+'" class="header">';
            //<img src="images/03dcbe8cbc1ede74e0c84bd8d45bec08.webp" class="header">
        $("#pro_pic").html(ss);
        $("#nickname").html(data[0]['nickname']);
        $("#occupation").html(data[0]['occupation']);
        $("#sex").html(data[0]['sex']);
        var s='<img src="'+data[0]['grade_pic_path']+' " title="等级：'+data[0]['grade']+'">';
        $("#grade").html(s);
        var str='';
        for(var i=1;i<data.length;i++){
            str+='<li class="t_content"><a class="tit" href="PO.html?post_id='+data[i]['post_id']+'">'+data[i]['title']+'</a><span class="comm"><i class="comm_icon"></i>评论（'+data[i]['comments']+') </span><span class="comm"><i class="date_icon"></i>'+data[i]['date']+'&nbsp;&nbsp; </span></li> ';
        }
        $("#post").html(str);
        /*
                                <li class="t_content">
                            <a class="tit" href="#">发布的帖子标题
                            </a>
                            <span class="comm"><i class="comm_icon"></i> 评论（0）
                            </span>
                            <span class="comm"><i class="date_icon"></i> 2018-01-01&nbsp;&nbsp;
                            </span>
                        </li>
        */
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
