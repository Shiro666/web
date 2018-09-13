var editor = new wangEditor( document.getElementById('area') );
editor.customConfig.menus = [
    'head',  // 标题
    'bold',  // 粗体
    'italic',  // 斜体
    'underline',  // 下划线
    'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'link',  // 插入链接
    'list',  // 列表
    'justify',  // 对齐方式
    'quote',  // 引用
    'emoticon',  // 表情
    'image',  // 插入图片
    'table',  // 表格
    'video',
    'undo',  // 撤销
    'redo'  // 重复
]
// 下面两个配置，使用其中一个即可显示“上传图片”的tab。但是两者不要同时使用！！！
//editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
//editor.customConfig.uploadImgServer = 'html/up_img.php'; // 上传图片到服务器
//editor.customConfig.uploadFileName = 'FileName';
//editor.config.hideLinkImg = true;
editor.customConfig.uploadImgServer = 'up_img.php'
editor.customConfig.uploadFileName = 'file';
editor.customConfig.uploadImgHeaders = {
    'Accept' : 'multipart/form-data'
};
editor.customConfig.uploadImgHooks = {
    error: function (xhr, editor) {
        alert("2:"+xhr);
        // 图片上传出错时触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
    },
    fail: function (xhr, editor, result) {
        alert("1:"+xhr);
    },
    success:function(xhr, editor, result){
        // console.log(result)
        // insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.webp')
    },
    customInsert: function (insertImg, result, editor) {
        //console.log(result)
        // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
        // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
        // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
        insertImg(result.data)
        alert(result.data);
    }
};
editor.customConfig.debug = true
editor.create();


$.ajax({
    type:'GET',  //POST,GET必须大写
    async:false,
    url:'fraud_preven_ranking.php',
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){//获取后端json拼装html，这里有个id没用上是用来以后写href的，这样才知道跳转到哪里
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
            bstr+= '<li><em class="sp-txt-num num-code1 ul2liem">' + (i+1)+ '</em><a href="PO.html?post_id='+data[i]['post_id']+'"><strong class="strong">' + data[i]['title'] + '</strong></a></li>';
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
        $("#ul3").html(cnewContent);

    }
};
xhr.open('GET','http://localhost/data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/

function is_login(){
    if($("#Aprf1").is(':visible')){
        return true;
    }
    else{
        return false;
    }
}

$("#publish").bind("click",function(){
    //获取表单输入
    if(is_login()){
    var str1=$("#title").val();
    var str2=editor.txt.html();
    var str3=$("select option:selected").text();
    var date=new Date();
    var str="";
    str+=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
    var str4=$.cookie("user_id");
    //alert(str1+str2+str3+str);
    //alert(str);
    //ajax post请求，将表单输入封装为json格式数据{'title':标题,'content':正文,'type':帖子类型,'date':日期}，发送给后台up_post模块，进行存储，后台返回名为
    //data的json数据，结构为{'status':成功还是失败,'err_msg':审核不通过的原因}（因为可能有审核通过或不通过两种情况）
        $.ajax({
            type:'POST',  //POST,GET必须大写
            url:'up_post.php',
            data:{'user_id':str4,'title':str1,'content':str2,'type':str3,'date':str},
            dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
            success:function(data){
                if(data.status=="success"){//审核通过
                    alert("上传成功");
                    window.location.href='BBS.html?post_type=0';
                }
                else if(data.status=="fail"){//审核不通过
                    alert("上传失败，失败原因："+data.msg);
                }
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
    }
    else{
        $("#btnc").click();
    }
}
);

function  show_video_upload_box() {
    layer.open({
        type: 1,
        title: "上传视频",
        content: $("#video_upload_box")
    });
}




