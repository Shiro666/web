$("#shuoming1").show();
$("#biaoji1").show();
$("#errshuoming1").hide();
$("#shuoming2").show();
$("#biaoji2").show();
$("#errshuoming2").hide();
$("#shuoming3").show();
$("#biaoji3").show();
$("#errshuoming3").hide();
$("#shuoming4").show();
$("#biaoji4").show();
$("#errshuoming4").hide();
$("#shuoming5").show();
$("#biaoji5").show();
$("#errshuoming5").hide();
var url = decodeURI(window.location.href);
var argsIndex = url.split("?user_id=");
var user_id=argsIndex[1];
$("#reg_input1").bind("blur",function () {
    var str1=$("#reg_input1").val();
    var regex=/^[a-zA-Z0-9_\u4e00-\u9fa5]{3,18}$/;
    if(regex.test(str1)){
        $("#biaoji1").hide();
        $("#errshuoming1").hide();
        $("#shuoming1").html("&#10003").removeClass("shuoming").addClass("shuomingright").show();
    }
    else {
        $("#shuoming1").hide();
        $("#biaoji1").hide();
        if(str1==''){$("#errshuoming1").html("！用户名不能为空").show();}
        else{
            if(str1.length<3||str1.length>18){
                $("#errshuoming1").html("！用户名应长度在3~18").show();
            }
            else{
                $("#errshuoming1").html("！用户名出现非法字符").show();
            }}
    }
});
$("#reg_input2").bind("blur",function () {
    var str2=$("#reg_input2").val();
    var regex=/^[1][3,4,5,7,8][0-9]{9}$/;
    if(regex.test(str2)){
        $("#biaoji2").hide();
        $("#errshuoming2").hide();
        $("#shuoming2").html("&#10003").removeClass("shuoming").addClass("shuomingright").show();
    }
    else {
        if(str2==''){
            $("#shuoming2").hide();
            $("#biaoji2").hide();
            $("#errshuoming2").html("！手机号码不能为空").show();
        }
        else{
            $("#shuoming2").hide();
            $("#biaoji2").hide();
            $("#errshuoming2").html("！手机号码格式有误").show();
        }}
});
$("#reg_input3").bind("blur",function () {
    var str3=$("#reg_input3").val();
    var regex=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    if(regex.test(str3)){
        $("#biaoji3").hide();
        $("#errshuoming3").hide()
        $("#shuoming3").html("&#10003").removeClass("shuoming").addClass("shuomingright").show();
    }
    else {
        if(str3==''){
            $("#shuoming3").hide();
            $("#biaoji3").hide();
            $("#errshuoming3").html("！邮箱不能为空").show();
        }else{
            $("#shuoming3").hide();
            $("#biaoji3").hide();
            $("#errshuoming3").html("！邮箱格式有误").show();
        }}
});
$("#reg_input4").bind("blur",function () {
    var str4=$("#reg_input4").val();
    var regex=/^[a-zA-Z0-9]{6,16}$/;
    if(regex.test(str4)){
        $("#biaoji4").hide();
        $("#errshuoming4").hide();
        $("#shuoming4").html("&#10003").removeClass("shuoming").addClass("shuomingright").show();
    }
    else {
        if(str4=''){
            $("#errshuoming4").html("！密码不能为空").show();
        }
        else{
            $("#shuoming4").hide();
            $("#biaoji4").hide();
            if(str4.length<6||str4.length>16){
                $("#errshuoming4").html("！密码应长度在6~16").show();
            }
            else{
                $("#errshuoming4").html("！密码出现非法字符").show();
            }
        }}
});
$.ajax({//主页不同栏目返回json的php模块不一样，但原理一样，暂时用同一个php返回的data代替
    type:'POST',  //POST,GET必须大写
    url:'user_attr_init.php',
    async:false,
    data:{'user_id':user_id},
    dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
    success:function(data){
        $("#reg_input1").val(data[0].nickname);
        $("#reg_input2").val(data[0].phone_number);
        $("#reg_input3").val(data[0].email);
        //$("#reg_input1").val(data.nickname);
        //$("#reg_input2").val(data.phone_number);
        //$("#reg_input3").val(data.email);
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
$("#reg_input3").autocomplete({

    delay: 0,//延迟时间
    autoFocus: true,
    source: function(request,response) {
        /*获取用户输入的内容
        alert(request.term);*/
        /*绑定数据源
        response(['a','aa','aaaa']);*/

        var hosts=['163.com','qq.com','gmail.com','126.com','yahoo.com','sohu.com','sina.com','hotmail.com','live.com'],
            term=request.term,//获取用户输入的内容
            name=term,//邮箱的用户名
            host='',//邮箱的域名
            ix=term.indexOf('@'),//获取@的位置
            result=[];//最终呈现的邮箱列表

        result.push(term);

        //当有@时，从新分配用户名和域名
        if(ix>-1){
            name=term.slice(0,ix);
            host=term.slice(ix+1);
        }

        if(name){
            //如果用户已经输入@和后面的域名
            //那么就找到相关的域名信息
            //如果用户没有输入@
            //那么就提示所有的域名
            var findedHosts;
            if(host){
                findedHosts=$.grep(hosts,function(value,index){
                    return value.indexOf(host)>-1;
                });
            }else{
                findedHosts=hosts;
            }
            //如果findedHosts为空，return也是空
            var findedResult=$.map(findedHosts,function(value,index){
                return name+'@'+value;
            });

            result=result.concat(findedResult);
        }
        response(result);
    },
});
$("#reg_submit").bind("click",function(){//！！！！！！待完善成JSON格式，添加新用户注册按钮点击事件：提交后台，进行判断，是否已注册，用户名唯一否之类
        var str1=$("#reg_input1").val();
        var str2=$("#reg_input2").val()
        var str3=$("#reg_input3").val();
        var str4=$("#reg_input4").val();
        var url = decodeURI(window.location.href);
        var argsIndex = url.split("?user_id=");
        var user_id=argsIndex[1];
        if(!($("#shuoming4").hasClass("errshuoming"))&&!($("#shuoming3").hasClass("errshuoming"))&&!($("#shuoming2").hasClass("errshuoming"))&&!$("#shuoming1").hasClass("errshuoming")){
            //alert("ALLLLLLL Right");
            //alert(str1+' '+str2+' '+str3+' '+str4+' ');
            $.ajax({
                type:'POST',  //POST,GET必须大写
                url:'modify_user_attr.php',
                data:{'user_id':user_id,'nickname':str1,'phone_number':str2,'email':str3,'password':str4},
                dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
                success:function(data){
                    if(data.status=="success"){//审核通过
                        alert("修改成功");
                        $.cookie('nickname','',{expires:-1,path:'/'});
                        $.cookie('password','',{expires:-1,path:'/'});
                        $.cookie('phone_number','',{expires:-1,path:'/'});
                        $.cookie('email', '',{expires:-1,path:'/'});
                        $.cookie('user_id', '',{expires:-1,path:'/'});
                        $.cookie("nickname",str1,{path:'/',expires:7});
                        $.cookie("phone_number",str2,{path:'/',expires:7});
                        $.cookie("email",str3,{path:'/',expires:7});
                        $.cookie("password",str4,{path:'/',expires:7});
                        $.cookie("user_id",user_id,{path:'/',expires:7});
                        window.location.href="HOME.html";
                    }
                    else if(data.status=="fail"){//审核不通过
                        alert("修改失败，失败原因："+data.msg);
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
    }
);