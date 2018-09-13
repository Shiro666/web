$("#submit").click(function () {
    var search_str=$("#search").val();
    $.ajax({
        type:'POST',  //POST,GET必须大写
        async:false,
        url:'search.php',
        data:{'search_str':search_str},
        dataType:'json',   //如果以json形式传输加上声明，否则容易出现问题
        success:function(data){
            if(data[0]['status']=='success'){
                var str = "";
                for (var i = 1; i <data.length; i++) {
                    str += '<div class="anli_list"><dl class="dl"><dt class="dt"><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="dldta">'+data[i]['title']+'</a></dt><div class="anli_content">'+data[i]['content']
                        +'</div><dd class="tag ddd"><span class="tagspan">时间：'+data[i]['date']+'&nbsp;浏览：'+'<em class="tagspanem">'+data[i]['viewers']+'</em></span><a href="ANLI_SHOW.html?case_id='+data[i]['case_id']+'" class="taga">阅读全文</a> </dd></dl></div>'
                }
                //alert(str);
                $('#a').html(str);
            }
            if(data[0]['status']=='fail'){
                $('#a').html(data[1]['msg']);
            }}
        ,
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

})

