<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑章节</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            //控制表单提交jquery代码
            $('.s_submit').addClass('disabled');
            $('form').children().change(function(){
                $('.s_submit').removeClass('disabled');
            });
            $('.s_submit').on('click',function(){
                //判断，如果小说名字不为空,并且要选择小说后的情况下才可以提交
                var abc= $('select').val();
               // alert(abc);
                if($('.s_name').val()!= ''&& abc != 0){
                    //不为空提交表单
                    $('form').submit();
                }else{
                    alert('请选择小说、而且小说章节序号不能为空！');
                    return false;
                }
            });
            //点击重置清空信息
            $('.s_reset').on('click',function(){
                $('form').get(0).reset();
                return false;
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="panel panel-info col-md-10">
            <div class="panel-heading" style="text-align: center">
                <h3 class="panel-title btn btn-info disabled">编 辑 小 说 章 节 及 内  容</h3>
            </div>
            <div class="panel-body">
                <form action="/index.php/Admin/Story/editItem" method="post">
                    <input type="hidden" name="id" value="<?php echo ($data1["id"]); ?>"/>
                    <div class="form-group ">
                        <label >1、请选择章节所属小说：</label>
                        <select class="form-control "name="str_id">
                            <option value="0">请选择：</option>
                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["sname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </div>
                    <div class="form-group ">
                        <label>2、请输入章节序号(必须是数字)：</label>
                        <input type="text" class="form-control s_name" name="sort" placeholder="" value="<?php echo ($data1["sort"]); ?>">
                    </div>
                    <div class="form-group ">
                        <label>3、请输入章节标题：</label>
                        <input type="text" class="form-control" name="title" placeholder="" value="<?php echo ($data1["title"]); ?>">
                    </div>
                    <div class="form-group">
                        <label>4、请输入章节内容：</label>
                        <textarea class="form-control" name="content" rows="6"><?php echo ($data1["content"]); ?></textarea>
                    </div>
                    <div class="form-group" style="text-align: center">
                        <button class="btn btn-info s_submit">提交</button>
                        <button class="btn btn-info s_reset">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>