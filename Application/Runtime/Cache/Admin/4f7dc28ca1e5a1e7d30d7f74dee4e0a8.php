<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在线聊天</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <style>
       .content{
            overflow: scroll;
            overflow-x: hide;
            height:280px;
            width:100%;
            border: 3px dashed pink;
            border-radius: 15px;  
       }
       .con_three{
            font-size:18px;
            font-weight: bold;
            color:red;
       }
    </style>
    <script>
        $(function(){
            //当用户选择了聊天对象，并且聊天内容不为空的时候才可以点击发送
            $('.chat_sel').change(function(){
                $('.chat_sub').removeClass('disabled');//显示发送消息按钮
                var text = $(".chat_sel option:selected").text();
                var id = $(".chat_sel").val();
                $('.chat_user').text(text);
                //alert(id);
                //当选择聊天对象的时候，把当前选择的对象全部聊天消息状态设置为已读
                var to_id =$('.chat_sel').val();
                $.ajax({
                    type: "post",
                    url: "/index.php/Admin/WebChat/setStatus",
                    data:{to_id:to_id},
                    dataType: "text",
                    success:function(data){

                    }
                });
            }); 
            //当按enter键盘的时候通用发送聊天消息
            $(document).keyup(function(event){
                  if(event.keyCode ==13){
                        $('.content').html(null);
                        //每次点击的时候获取传送的参数
                        var to_id =$('.chat_sel').val();
                        var content =$('.chat_con').val();
                        //alert(to_id+"---"+content);
                        //当内容不为空的时候才会提交数据，ajax实现数据入库功能
                        if(content != ''){
                            $.ajax({
                             type: "post",
                             url: "/index.php/Admin/WebChat/index",
                             data: {to_id:to_id,content:content},
                             dataType: "text",
                             success: function(data){
                                if(data =="发送消息失败!")
                                    alert(data);
                            }
                            });
                            $('.chat_con').val(null);
                        }else{
                            alert("亲，不能发送空消息哦！");
                        }
                  }
            });
            //ajax实现提交数据，因为使用form提交数据会产生页面跳转效果
            $('.chat_sub').on('click',function(){
                $('.content').html(null);
                //每次点击的时候获取传送的参数
                var to_id =$('.chat_sel').val();
                var content =$('.chat_con').val();
                //alert(to_id+"---"+content);
                //当内容不为空的时候才会提交数据，ajax实现数据入库功能
                if(content != ''){
                    $.ajax({
                     type: "post",
                     url: "/index.php/Admin/WebChat/index",
                     data: {to_id:to_id,content:content},
                     dataType: "text",
                     success: function(data){
                        if(data =="发送消息失败!")
                            alert(data);
                    }
                    });
                    $('.chat_con').val(null);
                }else{
                    alert("亲，不能发送空消息哦！");
                }
               // window.location.href="/index.php/Admin/WebChat/index?to_id="+to_id+"&content="+content;
            }); 
            //设置一个定时器，定时从数据库中读取聊天数据
            $('.content').html(null);
            setInterval(function(){
                //获取当前聊天对象的id，并作为参数传递
                var to_id =$('.chat_sel').val();
                $.ajax({
                     type: "post",
                     url: "/index.php/Admin/WebChat/chatContent",
                     data: {id:to_id},
                     dataType: "text",
                     success: function(data){
                            var json = eval("("+data+")");
                            var html = '<ul class="list-group chat_content">';
                            for(var i=0;i<json.length;i++){
                                html += '<li class="list-group-item chat_po"><span class="text-danger con_one">'+ '<label class="con_three">'+json[i].username +'</label>&nbsp;&nbsp;&nbsp;'+getLocalTime(json[i].addtime)+'</span><br/><span class="text-info con_two ">'+json[i].content+'</span></li>'; 
                                if(json[i].username == '<?php echo (session('username')); ?>'){
                                    $('.chat_po').addClass('text-right');
                                } 
                            }
                            $('.content').html(html);
                            $('.con_one').addClass('')
                            $('.content').scrollTop($('.content')[0].scrollHeight);
                            //alert(json[0].content);
                            //alert('<?php echo (session('username')); ?>') ;
                    }
                    });

            },3000);
            //设置定时器，实现新消息提示功能
             setInterval(function(){
                $('.chat_news').html(null);
                $.ajax({
                    type: "post",
                    url: "/index.php/Admin/WebChat/getCount",
                    data:{} ,
                    dataType: "text",
                    success: function(data){
                        var json1 = eval("("+data+")");
                        var html1 ='<ul class="list-group ">';
                        for(var i=0;i<json1.length;i++){
                            html1 += '<li class="list-group-item btn">'+json1[i].username+'</li>';
                        }
                        html1 += '</ul>';
                        $('.chat_news').html(html1);
                        //alert(json1[0].username);
                    }
                    
                });
             },2000);
        }); 
        //自定义格式化时间戳函数
        function getLocalTime(nS) {
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
        } 
        function addData(){
                //$('.content').html(null);
                //每次点击的时候获取传送的参数
                var to_id =$('.chat_sel').val();
                var content =$('.chat_con').val();
                //alert(to_id+"---"+content);
                //当内容不为空的时候才会提交数据，ajax实现数据入库功能
                if(content != ''){
                    $.ajax({
                     type: "post",
                     url: "/index.php/Admin/WebChat/index",
                     data: {to_id:to_id,content:content},
                     dataType: "text",
                     success: function(data){
                        if(data =="发送消息失败!")
                            alert(data);
                    }
                    });
                    $('.chat_con').val(null);
                }else{
                    alert("亲，不能发送空消息哦！");
                }
               // window.location.href="/index.php/Admin/WebChat/index?to_id="+to_id+"&content="+content;
            }    
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h2 class="text-success">在线web聊天工具，沟通你我他！</h3>
            </div>
             <div class="col-md-12 col-md-offset-4">
                <div class="text-success btn btn-success disabled">当前正在和<span class="chat_user" style="font-size:20px;color:red;"></span>聊天中...</div>
            </div>
            <div class="col-md-3 col-md-offset-1 form-group">
                <label for="name" class="btn btn-success disabled">请选择聊天对象：</label>
                <select class="form-control chat_sel" >
                    <option value="0">下拉列表：</option>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>      
                </select>
                <div class="form-group">
                    <label class="btn btn-success disabled">最新未读消息：</label>
                    <div class="chat_news">
                        <ul class="list-group ">
                           <!--  <li class="list-group-item btn">新消息1</li>
                            <li class="list-group-item btn">新消息1</li>
                            <li class="list-group-item btn">新消息1</li>
                            <li class="list-group-item btn">新消息1</li>
                            <li class="list-group-item btn">新消息1</li> -->
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <!-- <iframe  src="/index.php/Admin/WebChat/webChat" id="iframe" class="snow"  name="iframe" frameborder="1" scrolling="auto" height="280px" width="100%" ></iframe> -->
                <div class="content">
                    <ul class="list-group chat_content">
                        <li class="list-group-item">
                        <span class="text-danger">聊天对象--聊天时间！</span><br/>
                        <span class="text-info ">这是聊天内容！</span>
                        </li>   
                    </ul>
                </div>
            </div>
            <div class="col-md-8 text-center col-md-offset-4" style="margin-top:15px;">
                <button class="btn btn-success chat_sub disabled">发送消息</button>
                <button class="btn btn-success chat_more">更多消息</button>
            </div>
            <div  class="col-md-8 col-md-offset-4" style="margin_top:10px">
                <div class="form-group">
                    <textarea class="form-control chat_con" rows="2" name="content"></textarea>                  
                </div>
            </div>
        </div>
    </div>
</body>
</html>