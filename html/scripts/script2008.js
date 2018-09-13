//下一页
/*$("#pages a:eq(1)").removeClass("page").addClass("pageselected");
var N=-1;
$("#pages a").each(function(){$(this).click(function(){
    var pagenum=$(this).text();
    N=pagenum;//////此处使用AJAX变换视频内容

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
$("#syy").hide();*/



/*var xhr=new XMLHttpRequest();
xhr.onload=function() {
    if (xhr.status == 200) {
        responseObject = JSON.parse(xhr.responseText);
        var content="全部视频一共"+responseObject.video_list[0].num+'条';
        $("#video_content_titlespan").text(content);
        var anewContent = "";
        for (var i = 1; i < responseObject.video_list.length; i++) {
            anewContent += '<li class="video_contentulli"><div class="jvideo"><a href="#"><img height="102px" width="213.75px" src="' +
                responseObject.video_list[i].poster+'" > </a><div class="pd"><span class="video_time">'+
                responseObject.video_list[i].time + '</span></div></div><div class="video_title"><a class="video_titlea" href="#">'
                + responseObject.video_list[i].title + '</a></div></li>';
        }
        $("#video_ul").html(anewContent);
    }
}

xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/
var total_page_num;
$.ajax({
    type:'GET',  //POST,GET必须大写
    async:false,
    url:'video_num_get.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var content="全部视频一共"+data.video_total_num+'条';
        $("#video_content_titlespan").text(content);
        total_page_num=Math.ceil(parseInt(data.video_total_num)/20);
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

var page_num='1';//从第一页开始
$.ajax({
    type:'POST',  //POST,GET必须大写
    async:false,
    url:'video_info_get.php',
    data:{'page_number':page_num},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){

        var str = "";
        for (var i = 0; i <data.length; i++) {
            //alert(decodeURI(data[i]['poster_address']));
            str +='<li class="video_contentulli"><div class="jvideo"><a target="_blank" href="PLAY.html?video_id='+data[i]['video_id']+'"  title="'+data[i]['title']+' "><img height="102px" width="216px" src="' +
                decodeURI(data[i]['poster_address'])+'" > </a><div class="pd"><span class="video_time">'+
                data[i]['time'] + '</span></div></div><div class="video_title"><a target="_blank" class="video_titlea" title="'+data[i]['title']+' "href="PLAY.html?video_id='+data[i]['video_id']+'">'//href需要填充指示视频地址的id
                + data[i]['title'] + '</a></div></li>';
        }
        $("#video_ul").html(str);
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
        url:'video_info_get.php',
        data:{'page_number':a},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            var str = "";
            for (var i = 0; i <data.length; i++) {
                str +='<li class="video_contentulli"><div class="jvideo"><a target="_blank" href="PLAY.html?video_id='+data[i]['video_id']+'"  title="'+data[i]['title']+' "><img height="102px" width="216px" src="' +
                    data[i]['poster_address']+'" > </a><div class="pd"><span class="video_time">'+
                    data[i]['time'] + '</span></div></div><div class="video_title"><a target="_blank" class="video_titlea" title="'+data[i]['title']+' "href="PLAY.html?video_id='+data[i]['video_id']+'">'//href需要填充指示视频地址的id
                    + data[i]['title'] + '</a></div></li>';
            }
            $("#video_ul").html(str);
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