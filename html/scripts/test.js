$(".img_pre").hover(function(){
    $(this).find("img").attr("src","images/left_btn2.webp");
},function(){
    $(this).find("img").attr("src","images/left_btn1.webp");
});
$(".img_next").hover(function(){
    $(this).find("img").attr("src","images/right_btn2.webp");
},function(){
    $(this).find("img").attr("src","images/right_btn1.webp");
});

//下一页
$("#bbspages a:eq(1)").removeClass("page").addClass("pageselected");
$("#bbspages a").each(function(){$(this).click(function(){
    var pagenum=$(this).text();

    if(pagenum!='上一页'&&pagenum!='下一页'){//直接点数字
        //alert($(this).text());
        var ppagenum=parseInt(pagenum);
        if(ppagenum<=6){
            $("#bbspages .pageselected").eq(0).removeClass("pageselected").addClass("page");
            //$(this).removeClass("page").addClass("pageselected");
            //$("#slh").hide();
            var temp=$("#bbspages a");
            for(var i=1;i<temp.length-1;i++){
                temp.eq(i).text(i);
                var k=temp.eq(i).text();
                if(parseInt(k)==ppagenum){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }}
        else{

            var temp=$("#bbspages a");
            var t=-4;
            for(var i=2;i<temp.length-1;i++){
                temp.eq(i).text(ppagenum+t);
                t++;
            }
            $("#bbspages .pageselected").removeClass("pageselected").addClass("page");
            for(var i=0;i<temp.length;i++){var k=temp.eq(i).text();
                if(parseInt(k)==ppagenum){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            //$("#slh").show();
        }
        var n=$("#bbspages a .pageselected").text();
        n=parseInt(n);
        if(n==1){
            $("#bbspages a:contains('上一页')").hide();
        }
        if(false){//true改成尾页条件
            $("#bbspages a:contains('下一页')").hide();
        }
    }
    if(pagenum=="上一页"){
        var t=$("#bbspages .pageselected");
        var temp=t.text();
        var tempnum=parseInt(temp);
        if(temp-1<=6){
            $("#bbspages .pageselected").eq(0).removeClass("pageselected").addClass("page");
            //$(this).removeClass("page").addClass("pageselected");
            //$("#slh").hide();
            var temp=$("#bbspages a");
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
            var temp=$("#bbspages a");
            var t=-4;
            for(var i=2;i<temp.length-1;i++){
                temp.eq(i).text(tempnum+t);
                t++;
            }
            $("#bbspages .pageselected").removeClass("pageselected").addClass("page");
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
        var t=$("#bbspages .pageselected");
        var temp=$("#bbspages a");
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
            $("#bbspages .pageselected").removeClass("pageselected").addClass("page");
            for(var i=0;i<temp.length;i++){
                var k=temp.eq(i).text();
                if(parseInt(k)==tempnum+1){
                    temp.eq(i).removeClass("page").addClass("pageselected");
                }
            }
            //$("#slh").show();
        }

    }
    if($("#bbspages .pageselected").text()!="1"){
        $("#syy").show();
    }
    else{
        $("#syy").hide();
    }
    var a=$("#bbspages .pageselected").text();
    a=parseInt(a);
    if(a<=6){$("#slh").hide();}
    else{$("#slh").show();}
})});
$("#slh").hide();
$("#syy").hide();