var dialogInstace , onMoveStartId , mousePos = {x:0,y:0};	//	用于记录当前可拖拽的对象

// var zIndex = 9000;

//	获取元素对象
function g(id){return document.getElementById(id);}

//	自动居中元素（el = Element）
function autoCenter( el ){
    var bodyW = document.documentElement.clientWidth;
    var bodyH = document.documentElement.clientHeight;

    var elW = el.offsetWidth;
    var elH = el.offsetHeight;

    el.style.left = (bodyW-elW)/2 + 'px';
    el.style.top = (bodyH-elH)/2 + 'px';

}

//	自动扩展元素到全部显示区域
function fillToBody( el ){
    el.style.width  = document.documentElement.clientWidth  +'px';
    el.style.height = document.documentElement.clientHeight + 'px';
}

//	Dialog实例化的方法
function Dialog( dragId , moveId ){

    var instace = {} ;

    instace.dragElement  = g(dragId);	//	允许执行 拖拽操作 的元素
    instace.moveElement  = g(moveId);	//	拖拽操作时，移动的元素

    instace.mouseOffsetLeft = 0;			//	拖拽操作时，移动元素的起始 X 点
    instace.mouseOffsetTop = 0;			//	拖拽操作时，移动元素的起始 Y 点

    instace.dragElement.addEventListener('mousedown',function(e){

        var e = e || window.event;

        dialogInstace = instace;
        instace.mouseOffsetLeft = e.pageX - instace.moveElement.offsetLeft ;
        instace.mouseOffsetTop  = e.pageY - instace.moveElement.offsetTop ;

        onMoveStartId = setInterval(onMoveStart,10);
        return false;
        // instace.moveElement.style.zIndex = zIndex ++;
    })

    return instace;
}

//	在页面中侦听 鼠标弹起事件
document.onmouseup = function(e){
    dialogInstace = false;
    clearInterval(onMoveStartId);
}
document.onmousemove = function( e ){
    var e = window.event || e;
    mousePos.x = e.clientX;
    mousePos.y = e.clientY;


    e.stopPropagation && e.stopPropagation();
    e.cancelBubble = true;
    e = this.originalEvent;
    e && ( e.preventDefault ? e.preventDefault() : e.returnValue = false );

    document.body.style.MozUserSelect = 'none';
}

function onMoveStart(){


    var instace = dialogInstace;
    if (instace) {

        var maxX = document.documentElement.clientWidth -  instace.moveElement.offsetWidth;
        var maxY = document.documentElement.clientHeight - instace.moveElement.offsetHeight ;

        instace.moveElement.style.left = Math.min( Math.max( ( mousePos.x - instace.mouseOffsetLeft) , 0 ) , maxX) + "px";
        instace.moveElement.style.top  = Math.min( Math.max( ( mousePos.y - instace.mouseOffsetTop ) , 0 ) , maxY) + "px";

    }

}





//	重新调整对话框的位置和遮罩，并且展现
function showDialog(){
    g('dialogMove').style.display = 'block';
    g('mask').style.display = 'block';
    autoCenter( g('dialogMove') );
    fillToBody( g('mask') );
}

//	关闭对话框
function hideDialog(){
    g('dialogMove').style.display = 'none';
    g('mask').style.display = 'none';
}

//	侦听浏览器窗口大小变化
//window.onresize = showDialog;

Dialog('dialogDrag','dialogMove');

function log_off(){
    $.cookie('nickname','',{expires:-1,path:'/'});
    $.cookie('password','',{expires:-1,path:'/'});
    $.cookie('phone_number','',{expires:-1,path:'/'});
    $.cookie('email', '',{expires:-1,path:'/'});
    $.cookie('user_id', '',{expires:-1,path:'/'});
    location.reload(true);
    $("#Aprf2").show();
    $("#Aprf1").hide();
}

if($.cookie("nickname")){
    $("#Aprf2").hide();
    $("#Aprf1").html('<a href="PERSONAL_INFO.html?user_id='+$.cookie('user_id')+'">['+$.cookie("nickname")+']</a>'+'&nbsp;&nbsp;<a href="javascript:;" onclick="log_off()">[退出登录]</a> ').show();
}
else{
    $("#Aprf1").hide();
}
//$("#Aprf1").hide();
$("#warn").hide();
$("#ui-dialog-submit").bind("click",function () {
    /*var str1=$("#username").val();
    var str2=$("#password").val();
    if(false) {//后台检验用户是否存在，密码对不对
        $("#warn").show();
    }
    else{
        $("#ui-dialog-closebutton").click();
        $("#Aprf2").hide();
        $("#Aprf1").html('<a onclick="showmsg()" href="#">['+str1+']</a>').show();
    }*/
    //cookie存储用户昵称、手机、邮箱、密码
    var str1=$("#username").val();
    var str2=$("#password").val();
    if(($.cookie("phone_number")==str1)||($.cookie("email")==str1)){
        if($.cookie("password")==str2){
            $("#ui-dialog-closebutton").click();
            location.reload(true);
            $("#Aprf2").hide();
            $("#Aprf1").html('<a href="PERSONAL_INFO.html?user_id='+$.cookie('user_id')+'">['+$.cookie("nickname")+']</a>'+'&nbsp;&nbsp;<a href="javascript:;" onclick="log_off()">[退出登录]</a> ').show();
        }
        else{
            $("#warn").show();
        }
    }
    else{
        $.cookie('nickname', '',{expires:-1,path:'/'});
        $.cookie('password','',{expires:-1,path:'/'});
        $.cookie('phone_number', '',{expires:-1,path:'/'});
        $.cookie('email', '',{expires:-1,path:'/'});
        $.cookie('user_id', '',{expires:-1,path:'/'});
        $.ajax({
            type:'POST',  //POST,GET必须大写
            url:'login.php',
            data:{'phone_number_or_email':str1,'password':str2},
            async:false,
            dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
            success:function(data){
                if(data.status=='success'){
                    //alert("success");
                    $.cookie("nickname",data.nickname,{path:'/',expires:7});
                    $.cookie("phone_number",data.phone_number,{path:'/',expires:7});
                    $.cookie("email",data.email,{path:'/',expires:7});
                    $.cookie("password",data.password,{path:'/',expires:7});
                    $.cookie("user_id",data.user_id,{path:'/',expires:7});
                    $("#ui-dialog-closebutton").click();
                    location.reload(true);
                    $("#Aprf2").hide();
                    $("#Aprf1").html('<a href="PERSONAL_INFO.html?user_id='+$.cookie('user_id')+'">['+data.nickname+']</a>'+'&nbsp;&nbsp;<a href="javascript:;" onclick="log_off()">[退出登录]</a> ').show();
                }
                if(data.status=='fail'){
                    $("#warn").show();
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
                location.reload(true);
            }
        });
    }
});
$("#password").bind("blur",function () {
    $("#warn").hide();
});



