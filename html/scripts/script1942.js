var editor0 = new wangEditor( document.getElementById('abc') );
editor0.customConfig.menus = [
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
    'undo',  // 撤销
    'redo'  // 重复
]
// 下面两个配置，使用其中一个即可显示“上传图片”的tab。但是两者不要同时使用！！！
//editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
//editor.customConfig.uploadImgServer = 'html/up_img.php'; // 上传图片到服务器
//editor.customConfig.uploadFileName = 'FileName';
//editor.config.hideLinkImg = true;
editor0.customConfig.uploadImgServer = 'up_img.php'
editor0.customConfig.uploadFileName = 'file';
editor0.customConfig.uploadImgHeaders = {
    'Accept' : 'multipart/form-data'
};
editor0.customConfig.uploadImgHooks = {
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
editor0.customConfig.debug = true
editor0.create();
/*var xhr=new XMLHttpRequest();
xhr.onload=function(){
    if(xhr.status==200){
        responseObject=JSON.parse(xhr.responseText);
        var str="";
        for(var i=1;i<responseObject.comment.length-1;i++){
            str+='<tbody style="background-color: white;" class="borderstyle"><tr><td class="td1"><div class="td1_big_div"><div class="td1_big_div_head"><div class="ck"><a  class="id_nich" href="#">ID或昵称</a></div></div><div><div class="img_rq"><img src="images/noavatar_middle.gif"></div></div><div class="tznum"><img src="images/a9c32c8aceb5c5b0937d1ad90be5fbdb.webp">&nbsp;发帖&nbsp;'+responseObject.comment[i].t_num+'<div class="stars"><img src="images/fourstars.webp"></div></div></div></td><td class="td2"><div class="pbtime"><img class="pbtimeimg" src="images/ff819f90d26612b5bfb590b958147505.webp" ><span><em class="pbtimeem">&nbsp;</em><em class="pbtimeem">发表于'
            +responseObject.comment[i].date+'</em></span></div><div class="plnr">'+responseObject.comment[i].content+'</div></td></tr><tr><td class="space"></td><td class="hl"><div class="hl_div"><em class="hl_divem"><img  src="images/3ee07ed259cedd3e04c3418da3526dca.webp" >&nbsp;<a  class="hl_divema" href="#abc" onclick="paste_to_editor(this)">回复</a></em><p class="lou">'+i+'楼</p></div></td></tr><tr class="bottom"><td class="bottom_left"></td><td class="botton_right"></td></tr></tbody>';
        }//图片路径！！！！
        $("#big_table").html(str);


    }
};
xhr.open('GET','../data/tsconfig.json',true);//tsconfig.json中的msg_detail是案例具体信息JSON格式
xhr.send(null);*/

function paste_to_editor(e) {
    var els = document.getElementsByClassName("hl_divema");
    var k=0;
        for (var i = els.length;i-- ; ) {
            if(els[i] == e){
                k=i;
                break;
            }
        }

    var con=$(".plnr").eq(k).text();
    editor0.txt.html('<fieldset class="field"><legend  style="margin-left: 5px;">回复'+(k+1)+'楼:'+'</legend>'+con+'</fieldset>');

}

var url = decodeURI(window.location.href);
var argsIndex = url.split("?post_id=");
var post_id=argsIndex[1];

$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'POST',  //POST,GET必须大写
    url:'post_info_detail_get.php',
    async:false,
    data:{'post_id':post_id},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        var str="";

        $("#title").html(data[0]['title']);
        $("#comments").html(data[0]['comments']);
        for(var i=1;i<data.length;i++){
            str+='<tbody style="background-color: white;" class="borderstyle"><tr><td class="td1"><div class="td1_big_div"><div class="td1_big_div_head"><div class="ck"><a  class="id_nich" href="PERSONAL_INFO.html?user_id='+data[i]['user_id']+'">'+data[i]['nickname']+'</a></div></div><div><div class="img_rq"><img src="'+data[i]['pro_pic_path']+'"></div></div><div class="tznum"><img src="images/a9c32c8aceb5c5b0937d1ad90be5fbdb.webp">&nbsp;发帖&nbsp;'+data[i]['post_num']+'<div class="stars"><img src="'+data[i]['grade_pic_path']+'"></div></div></div></td><td class="td2"><div class="pbtime"><img class="pbtimeimg" src="images/ff819f90d26612b5bfb590b958147505.webp" ><span><em class="pbtimeem">&nbsp;</em><em class="pbtimeem">发表于'
                +data[i]['date']+'</em></span></div><div class="plnr">'+data[i]['content']+'</div></td></tr><tr><td class="space"></td><td class="hl"><div class="hl_div"><em class="hl_divem"><img  src="images/3ee07ed259cedd3e04c3418da3526dca.webp" >&nbsp;<a  class="hl_divema" href="#abc" onclick="paste_to_editor(this)">回复</a></em><p class="lou">'+i+'楼</p></div></td></tr><tr class="bottom"><td class="bottom_left"></td><td class="botton_right"></td></tr></tbody>';
        }
        if(!support)str=str.replace("/webp/g","jpg");
        $("#big_table").html(str);
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

function is_login(){
    if($("#Aprf1").is(':visible')){
        return true;
    }
    else{
        return false;
    }
}


document.getElementById('btn1').addEventListener('click', function () {
    // 查询登录状态！！！！！！！！！
    //alert(editor0.txt.html());
    if(is_login()){
    var myDate = new Date();
    //获取当前年
    var year = myDate.getFullYear();
    //获取当前月
    var month = myDate.getMonth() + 1;
    //获取当前日
    var day = myDate.getDate();
    var str1=$.cookie('user_id');
    var str2=editor0.txt.html();
    var str3=year+'-'+month+'-'+day;
    $.ajax({
        type:'POST',  //POST,GET必须大写
        url:'up_comment.php',
        data:{'user_id':str1,'content':str2,'date':str3,post_id:post_id},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            if(data.status=="success"){//审核通过
                alert("上传成功");
                location.reload();
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
    });}
    else{
        $("#login_button").click();
    }
    }
, false)

