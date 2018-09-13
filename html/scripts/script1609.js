

/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200) {
        responseObject = JSON.parse(xhr.responseText);
        var anewContent = "";
        var bnewContent = "";
        var cnewContent = "";
        for (var i = 0; i < responseObject.board.length; i++) {
            anewContent += '<li><em class="sp-txt-num num-code1 ul1liem">' + responseObject.board[i].rank + '</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">' + responseObject.board[i].title + '</strong></a></li>';
        }
        $("#ul1").html(anewContent);
        for (var i = 0; i < responseObject.board.length; i++) {
            bnewContent += '<li><em class="sp-txt-num num-code1 ul2liem">' + responseObject.board[i].rank + '</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">' + responseObject.board[i].title + '</strong></a></li>';
        }
        $("#ul2").html(bnewContent);
        for (var i = 0; i < responseObject.board.length; i++) {
            cnewContent += '<li><em class="sp-txt-num num-code1 ul3liem">' + responseObject.board[i].rank + '</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">' + responseObject.board[i].title + '</strong></a></li>';
        }
        $("#ul3").html(cnewContent);*/
        /*var str = "";
        for (var i = 0; i < responseObject.msg_bbslist.length; i++) {
            str += '<li class="news_listli"><div class="hd"><a class="hd"><em class="hdem">' + responseObject.msg_bbslist[i].type + '</em><a href="javascript:;" class="hda" >' + responseObject.msg_bbslist[i].title + '</a></div><div class="ft"><span class="ftspan"><img src="images/comment.webp">&nbsp; ' + responseObject.msg_bbslist[i].comments + '&nbsp;&nbsp;</span><span class="ftspan"><img src="http://localhost/images/calendar-icon.webp">&nbsp;' + responseObject.msg_bbslist[i].date + '</span></div></li>'
        }
        $("#news_list").prepend(str);
        $("#all").html(responseObject.bbslist_sum[0].all);
        $("#exp").html(responseObject.bbslist_sum[0].exp);
        $("#commu").html(responseObject.bbslist_sum[0].commu);
        $("#pianzi").html(responseObject.bbslist_sum[0].pianzi);
    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/
function checkWebp() {
    try{
        return (document.createElement('canvas').toDataURL('image/webp').indexOf('data:image/webp') == 0);
    }catch(err) {
        return  false;
    }
};
var support=checkWebp();
var str='1';//从第一页开始
var url = decodeURI(window.location.href);
var argsIndex = url.split("?post_type=");
var post_type=argsIndex[1];
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    url:'post_info_get.php',
    data:{'page_number':str,'post_type':post_type},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var str = "";
        for (var i = 0; i <data.length; i++) {
            str += '<li class="news_listli"><div class="hd"><a class="hd"><em class="hdem">' + data[i]['type'] + '</em><a href="PO.html?post_id='+data[i]['post_id']+'" class="hda" >' + data[i]['title'] + '</a></div><div class="ft"><span class="ftspan"><img src="images/comment.jpg">&nbsp; ' + data[i]['comments'] + '&nbsp;&nbsp;</span><span class="ftspan"><img src="images/calendar-icon.jpg">&nbsp;' + data[i]['date'] + '</span></div></li>'
        }
        $("#news_list").prepend(str);
        //alert(data);
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
    url:'fraud_preven_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var astr="";
        for(var i=0;i<data.length;i++){
            astr+='<li><em class="sp-txt-num num-code1 ul1liem">' +(i+1)+ '</em><a href="PO.html?post_id='+data[i]['post_id']+'"><strong class="strong">' + data[i]['title']+'</strong></a></li>'
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
$.ajax({
    type:'GET',  //POST,GET必须大写
    async:false,
    url:'experience_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){//获取后端json拼装html，这里有个id没用上是用来以后写href的，这样才知道跳转到哪里
        var bstr="";
        for(var i=0;i<data.length;i++){
            bstr+= '<li><em class="sp-txt-num num-code1 ul2liem">' + (i+1) + '</em><a href="PO.html?post_id='+data[i]['post_id']+'"><strong class="strong">' + data[i]['title'] + '</strong></a></li>';
        }
        $("#ul2").html(bstr);
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
    url:'exposure_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){//获取后端json拼装html，这里有个id没用上是用来以后写href的，这样才知道跳转到哪里
        var cstr="";
        for(var i=0;i<data.length;i++){
            cstr+= '<li><em class="sp-txt-num num-code1 ul3liem">' +  (i+1) + '</em><a href="PO.html?post_id='+data[i]['post_id']+'" ><strong class="strong">' + data[i]['title'] + '</strong></a></li>'
        }
        $("#ul3").html(cstr);
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
var total_page_num;
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    url:'post_type_num_get.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        //total_page_num=Math.ceil(parseInt(data.total_num)/10);
        if(post_type=='0'){
            total_page_num=Math.ceil(parseInt(data.total_num)/10);
        }
        if(post_type=='1'){
            total_page_num=Math.ceil(parseInt(data.exp_num)/10);
        }
        if(post_type=='2'){
            total_page_num=Math.ceil(parseInt(data.commu_num)/10);
        }
        if(post_type=='3'){
            total_page_num=Math.ceil(parseInt(data.expo_num)/10);
        }
        $("#all").html(data.total_num);
        $("#exp").html(data.exp_num);
        $("#commu").html(data.commu_num);
        $("#pianzi").html(data.expo_num);
    }
});
if(post_type=='0'){
    $(".item:contains(全部)").removeClass("item").addClass("item2");
}
else if(post_type=='1'){
    $(".item:contains(被骗经历)").removeClass("item").addClass("item2");
}
else if(post_type=='2'){
    $(".item:contains(防骗交流)").removeClass("item").addClass("item2");
}
else if(post_type=='3'){
    $(".item:contains(曝光骗子)").removeClass("item").addClass("item2");
}

$(".item").bind("click",function(){
    $(".item2").eq(0).removeClass("item2").addClass("item");
    $(this).removeClass("item").addClass("item2");
});
//下一页
$("#pages a:eq(1)").removeClass("page").addClass("pageselected");
$("#pages a").each(function(){$(this).click(function(){
    var c=$("#pages a");
    for(var i=0;i<c.length;i++){
        if(parseInt(c.eq(i).text())<total_page_num){
            c.eq(i).show();
        }
    }

    var pagenum=$(this).text();
    var ele_li=$("#news_list li");
    for(var i=0;i<ele_li.length-1;i++){
        ele_li.eq(i).remove();
    }
    if(pagenum!='上一页'&&pagenum!='下一页'){//直接点数字
        //alert($(this).text());
        var ppagenum=parseInt(pagenum);
        if(ppagenum<=6){
            $("#pages .pageselected").eq(0).removeClass("pageselected").addClass("page");
            //$(this).removeClass("page").addClass("pageselected");
            //$("#slh").hide();
            var temp=$("#pages a");
            for(var i=1;i<temp.length-1;i++){
                temp.eq(i).text(i);
                var k=temp.eq(i).text();
                if(parseInt(k)==ppagenum){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }}
        else{

            var temp=$("#pages a");
            var t=-4;
            for(var i=2;i<temp.length-1;i++){
                temp.eq(i).text(ppagenum+t);
                t++;
            }
            $("#pages .pageselected").removeClass("pageselected").addClass("page");
            for(var i=0;i<temp.length;i++){var k=temp.eq(i).text();
                if(parseInt(k)==ppagenum){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            //$("#slh").show();
        }
        var n=$("#pages a .pageselected").text();
        n=parseInt(n);
        if(n==1){
            $("#pages a:contains('上一页')").hide();
        }
        var temp=$("#pages pageselected");

    }
    if(pagenum=="上一页"){
        var t=$("#pages .pageselected");
        var temp=t.text();
        var tempnum=parseInt(temp);
        if(temp-1<=6){
            $("#pages .pageselected").eq(0).removeClass("pageselected").addClass("page");
            //$(this).removeClass("page").addClass("pageselected");
            //$("#slh").hide();
            var temp=$("#pages a");
            for(var i=1;i<temp.length-1;i++){
                temp.eq(i).text(i);
                var k=temp.eq(i).text();
                if(parseInt(k)==tempnum-1){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
        }
        else if(temp-1>6){
            tempnum=tempnum-1;
            var temp=$("#pages a");
            var t=-4;
            for(var i=2;i<temp.length-1;i++){
                temp.eq(i).text(tempnum+t);
                t++;
            }
            $("#pages .pageselected").removeClass("pageselected").addClass("page");
            for(var i=0;i<temp.length;i++){var k=temp.eq(i).text();
                if(parseInt(k)==tempnum){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            //$("#slh").show();
        }
    }
    if(pagenum=='下一页'){
        // alert($(this).text());
        var t=$("#pages .pageselected");
        var temp=$("#pages a");
        var tem=t.text();
        var tempnum=parseInt(tem);
        if(tempnum+1<=6){
            for(var i=0;i<temp.length;i++){
                var k=temp.eq(i).text();
                if(parseInt(k)==tempnum+1){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            t.removeClass("pageselected").addClass("page");}
        if(tempnum+1>6){

            var t=-4;
            for(var i=2;i<temp.length-1;i++){
                temp.eq(i).text(tempnum+1+t);
                t++;
            }
            $("#pages .pageselected").removeClass("pageselected").addClass("page");
            for(var i=0;i<temp.length;i++){
                var k=temp.eq(i).text();
                if(parseInt(k)==tempnum+1){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            //$("#slh").show();
        }

    }
    if($("#pages .pageselected").text()!="1"){
        $("#syy").show();
    }
    else{
        $("#syy").hide();
    }
    var a=$("#pages .pageselected").text();
    a=parseInt(a);
    if(a<=6){$("#slh").hide();}
    else{$("#slh").show();}

    for(var i=0;i<c.length;i++){
        if(parseInt(c.eq(i).text())>total_page_num){
            c.eq(i).hide();
        }
        else if(parseInt(c.eq(i).text())<=total_page_num){
            c.eq(i).show();
        }
    }
    $.ajax({
        type:'POST',  //POST,GET必须大写
        async:false,
        url:'post_info_get.php',
        data:{'page_number':a,'post_type':post_type},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            var str = "";
            for (var i = 0; i <data.length; i++) {
                str += '<li class="news_listli"><div class="hd"><a class="hd"><em class="hdem">' + data[i]['type'] + '</em><a href="PO.html?post_id='+data[i]['post_id']+'" class="hda" >' + data[i]['title'] + '</a></div><div class="ft"><span class="ftspan"><img src="images/comment.jpg">&nbsp; ' + data[i]['comments'] + '&nbsp;&nbsp;</span><span class="ftspan"><img src="images/calendar-icon.jpg">&nbsp;' + data[i]['date'] + '</span></div></li>'
            }
            $("#news_list").prepend(str);
            //alert(data);
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
    if(a>=total_page_num){//true改成尾页条件
        //alert(parseInt(temp.text()));
        $("#pages a:contains('下一页')").hide();
    }

    else{
        $("#pages a:contains('下一页')").show();
    }
})});
$("#slh").hide();
$("#syy").hide();
function  turn_to_publish() {
    if($("#Aprf1").is(":visible")) {
        window.location.href = 'PUBLISH.html';
    }
    else if($("#Aprf2").is(":visible")){
        $("#login_button").click();
    }
}
function  turn_to_up_video() {
    if($("#Aprf1").is(":visible")) {
        show_video_upload_box();
    }
    else if($("#Aprf2").is(":visible")){
        $("#login_button").click();
    }
}