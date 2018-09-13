$("#reg_input1").bind("focus",function () {
    $("#errshuoming7").hide();
});
$("#reg_input2").bind("focus",function () {
    $("#errshuoming2").hide();
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
$("#reg_input5").bind("blur",function () {
    var str5=$("#reg_input5").val();
    var str4=$("#reg_input4").val();
    if(str4==str5){
        $("#biaoji5").hide();
        $("#errshuoming5").hide();
        $("#shuoming5").html("&#10003").removeClass("shuoming").addClass("shuomingright").show();
    }
    else {
        $("#errshuoming5").html("！两次输入的密码不一致").show();
    }
});
$("#reg_submit_7").bind("click",function(){//
    var str1=$("#reg_input1").val();
    var str2=$("#reg_input2").val();
    var str3=$("#reg_input4").val();
    var str4=$("select[name='select2'] option:selected").val();
    /*if(str1=="123456789"&&str2=="34"){//后台匹配输入账号是否存在、问题答案是否正确
        $("#ppassword_sent_msg").show();
        $("#errshuoming7").hide();
    }
    else if(str1!="123456"){//账号不存在
        $("#errshuoming7").html("*该账号不存在").show();
        if(str2!="34"){//答案不正确
            $("#errshuoming2").html("答案不正确").show();
        }
    }*/
    
    if($("#shuoming4").hasClass("shuomingright")&&$("#shuoming5").hasClass("shuomingright")) {
        $.ajax({
            type: 'POST',  //POST,GET必须大写
            url: 'forget_password.php',
            data: {'phone_number_or_email': str1, 'question':str4,'answer': str2, 'password': str3},
            dataType: 'json',   //如果以json形式传输加上声明，否则容易出现问题
            success: function (data) {
                if (data.status == "success") {//审核通过
                    alert("密码重置成功");
                    window.location.href="HOME.html";
                }
                else if (data.status == "fail") {//审核不通过
                    //alert("注册失败，失败原因：" + data.msg);
                    if(data.type.indexOf("1") != -1){
                        $("#errshuoming7").html("*该账号不存在").show();
                    }
                    if(data.type.indexOf("2") != -1){
                        $("#errshuoming3").html("问题选择有误").show();
                    }
                    if(data.type.indexOf("3") != -1){
                        $("#errshuoming2").html("答案不正确").show();
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                // 状态码
                //console.log(XMLHttpRequest.status);
                // 状态
                //console.log(XMLHttpRequest.readyState);
                // 错误信息
                //console.log(textStatus);
                alert("状态码：" + XMLHttpRequest.status + " 状态：" + XMLHttpRequest.readyState + " 错误信息：" + textStatus);
            }
        });
    }
    }
);