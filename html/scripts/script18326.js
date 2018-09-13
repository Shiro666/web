/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200){
        responseObject=JSON.parse(xhr.responseText);
        $("#cont_box").html(responseObject.msg_detail[0].content);//文本转成相应的html格式？
        var str="";
        str+='发布时间：'+responseObject.msg_detail[0].date+'&nbsp;|&nbsp;浏览：'+responseObject.msg_detail[0].viewers;
        $("#p_anli_c_2").html(str);
        var anewContent="";
        var bnewContent="";
        for(var i=0;i<responseObject.board.length;i++){
            anewContent+='<li><em class="sp-txt-num num-code1 ul1liem">'+responseObject.board[i].rank+'</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">'+responseObject.board[i].title+'</strong></a></li>';
        }
        $("#ul1").html(anewContent);
        for(var i=0;i<responseObject.board.length;i++){
            bnewContent+='<li><em class="sp-txt-num num-code1 ul2liem">'+responseObject.board[i].rank+'</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">'+responseObject.board[i].title+'</strong></a></li>';
        }
        $("#ul2").html(bnewContent);
    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);
*/


var url = decodeURI(window.location.href);
var argsIndex = url.split("?case_id=");
var case_id=argsIndex[1];
$.ajax({
    type:'POST',  //POST,GET必须大写
    url:'case_info_detail_get.php',
    data:{'case_id':case_id},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        $("#cont_box").html(data.content);//文本转成相应的html格式？
        var str="";
        str+='发布时间：'+data.date+'&nbsp;|&nbsp;浏览：'+data.viewers;
        $("#p_anli_c_2").html(str);
        $("#title").html("当前位置：电信诈骗>>"+data.title);
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
var case_type='1';//1代表电信诈骗
$.ajax({
    type:'POST',  //POST,GET必须大写
    data:{'case_type':case_type},
    async:false,
    url:'case_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){//获取后端json拼装html，这里有个id没用上是用来以后写href的，这样才知道跳转到哪里
        var astr="";
        for(var i=0;i<data.length;i++){
            astr+='<li><em class="sp-txt-num num-code1 ul1liem">'+(i+1)+'</em><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" "><strong class="strong">'+data[i]['title']+'</strong></a></li>';
        }
        $("#ul1").html(astr);
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
