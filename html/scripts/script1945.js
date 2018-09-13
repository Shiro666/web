//下一页
/*$("#pages a:eq(1)").removeClass("page").addClass("pageselected");
$("#pages a").each(function(){$(this).click(function(){
    var pagenum=$(this).text();//此处使用AJAX确定案例内容

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
        if(false){//true改成尾页条件
            $("#pages a:contains('下一页')").hide();
        }
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
})});
$("#slh").hide();
$("#syy").hide();
*/
/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200){
        responseObject=JSON.parse(xhr.responseText);
        var newContent='';
        var anewContent='';
        for(var i=0;i<responseObject.msg.length;i++){
            newContent+='<div class="anli_list"><dl class="dl"><dt class="dt"><a href="javascript:;" class="dldta" onclick="turn2anotherpage">'+responseObject.msg[i].title+'</a></dt><div class="anli_content">'+responseObject.msg[i].content
                +'</div><dd class="tag ddd"><span class="tagspan">时间：'+responseObject.msg[i].date+'&nbsp;浏览：'+'<em class="tagspanem">'+responseObject.msg[i].viewers+'</em></span><a href="#" class="taga">阅读全文</a> </dd></dl></div>'
        }
        $('#a').html(newContent);
        for(var i=0;i<responseObject.board.length;i++){
            anewContent+='<li><em class="sp-txt-num num-code1 ul1liem">'+responseObject.board[i].rank+'</em><a href="javascript:;" onclick="turn2anotherpage"><strong class="strong">'+responseObject.board[i].title+'</strong></a></li>';
        }

        $("#ul1").html(anewContent);

    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg案例列表数据的JSON格式,board是排行榜JSON格式
xhr.send(null);*/
var total_page_num;
var str='1';//从第一页开始
var url = decodeURI(window.location.href);
var argsIndex = url.split("?case_type=");
var case_type=argsIndex[1];
switch (case_type){
    case '1':
        $("#case_type").text("当前位置：支付宝诈骗");
        $("title").html("支付宝诈骗-诈骗信息发布网站");
        break;
    case '2':
        $("#case_type").text("当前位置：商业诈骗");
        $("title").html("商业诈骗-诈骗信息发布网站");
        break;
    case '3':
        $("#case_type").text("当前位置：手机银行诈骗");
        $("title").html("手机银行诈骗-诈骗信息发布网站");
        break;
    case '4':
        $("#case_type").text("当前位置：网络诈骗");
        $("title").html("网络诈骗-诈骗信息发布网站");
        break;
    case '5':
        $("#case_type").text("当前位置：网购诈骗");
        $("title").html("网购诈骗-诈骗信息发布网站");
        break;
    case '6':
        $("#case_type").text("当前位置：社会诈骗");
        $("title").html("社会诈骗-诈骗信息发布网站");
        break;

    case '7':
        $("#case_type").text("当前位置：电信诈骗");
        $("title").html("电信诈骗-诈骗信息发布网站");
        break;
    case '8':
        $("#case_type").text("当前位置：微信诈骗");
        $("title").html("微信诈骗-诈骗信息发布网站");
        break;

};

//var case_type=$("#case_type").text().substr(0);
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    data:{'case_type':case_type},
    url:'case_num_get.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){

        total_page_num=Math.ceil(parseInt(data.total_num)/9);
    }
});
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    url:'case_info_get.php',
    data:{'page_number':str,'case_type':case_type},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var str = "";
        for (var i = 0; i <data.length; i++) {
            str += '<div class="anli_list"><dl class="dl"><dt class="dt"><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="dldta">'+data[i]['title']+'</a></dt><div class="anli_content">'+data[i]['content']
                +'</div><dd class="tag ddd"><span class="tagspan">时间：'+data[i]['date']+'&nbsp;浏览：'+'<em class="tagspanem">'+data[i]['viewers']+'</em></span><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="taga">阅读全文</a> </dd></dl></div>'
        }
        $('#a').html(str);
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
    type:'POST',  //POST,GET必须大写
    data:{'case_type':case_type},
    async:false,
    url:'case_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){//获取后端json拼装html，这里有个id没用上是用来以后写href的，这样才知道跳转到哪里
        var astr="";
        for(var i=0;i<data.length;i++){
            astr+='<li><em class="sp-txt-num num-code1 ul1liem">'+(i+1)+'</em><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'"><strong class="strong">'+data[i]['title']+'</strong></a></li>';
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
        url:'case_info_get.php',
        data:{'page_number':a,'case_type':case_type},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            var str = "";
            for (var i = 0; i <data.length; i++) {
                str += '<div class="anli_list"><dl class="dl"><dt class="dt"><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="dldta">'+data[i]['title']+'</a></dt><div class="anli_content">'+data[i]['content']
                    +'</div><dd class="tag ddd"><span class="tagspan">时间：'+data[i]['date']+'&nbsp;浏览：'+'<em class="tagspanem">'+data[i]['viewers']+'</em></span><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="taga">阅读全文</a> </dd></dl></div>'
            }
            $('#a').html(str);
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