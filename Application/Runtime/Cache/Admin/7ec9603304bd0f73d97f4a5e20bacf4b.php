<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发送邮件</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/lang/zh-cn/zh-cn.js"></script>
    <script>
        $(function(){
            var ue = UE.getEditor('editor');
            //jquery实现点击发送提交表单
            $('#send_mail').on('click',function(){
               // alert($('[name="title"]').val());
                //发送邮件的判断，收件人、主题及邮件内容为必填内容，用juqery实现验证
                if($('[name="to_id"]').val()!=0 && $('[name="title"]').val()!==null && $('[name="content"]').val()!=null){
                    $('form').submit();
                }else{
                    alert("收件人、主题及邮件内容不能为空！")
                }

            });
        });
    </script>
</head>
<body>
    <!--自定义邮件界面，根据bootsrap制作，外面套一个面板，面板内部套表单，用来提交数据-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info" style="margin-top:10px;" >
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center">发送邮件</h3>
                    </div>
                    <div class="panel-body">

                           <form class="form-horizontal" role="form" action="/index.php/Admin/Email/sendMail" method="post" enctype="multipart/form-data">
                               <div class="form-group" >
                                   <label class="col-sm-2 control-label">收件人：</label>
                                   <div class="col-sm-4">
                                       <select name="to_id" class="form-control "  >
                                           <option value="0">请选择收件人：</option>
                                           <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label  class="col-sm-2 control-label">邮件主题：</label>
                                   <div class="col-sm-10">
                                       <input type="text" class="form-control" name="title"  placeholder="请输入邮件的主题...">
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">添加附件：</label>
                                   <div class="col-sm-10">
                                       <input type="file" name="file" class="file"  />
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label  class="col-sm-2 control-label">邮件内容：</label>
                               </div>
                               <div class="form-group">

                                   <div class="col-sm-12" >
                                       <script id="editor" name="content" type="text/plain" style="width:100%;height:150px;"></script>
                                   </div>
                               </div>
                               <div class="form-group" style="margin-left: 250px">
                                   <div class="col-sm-offset-2 col-sm-10" >
                                       <button style="margin-right:60px" type="button" id="send_mail" class="btn btn-success">发送</button>
                                   </div>
                               </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>