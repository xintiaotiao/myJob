<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑小说</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        //控制表单提交jquery代码
        $(function(){
            //当唯有修改记录的时候，提交按钮不能点击
            $('.s_submit').addClass('disabled');
            $('form').children().change(function(){
                $('.s_submit').removeClass('disabled');
            });
            $('.s_submit').on('click',function(){
                //判断，如果小说名字不为空的情况下才可以提交
                if($('.s_name').val()!= ''){
                    //不为空提交表单
                    $('form').submit();
                }else{
                    alert('小说名字不能为空！');
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
            <div class="panel panel-info col-md-5">
                <div class="panel-heading" style="text-align: center">
                    <h3 class="panel-title btn btn-info disabled">编 辑 小 说</h3>
                </div>
                <div class="panel-body">
                    <form action="/index.php/Admin/Story/edit" method="post">
                        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"  />
                        <div class="form-group ">
                            <label >1、请选择小说类别：</label>
                            <select class="form-control "name="stype">
                                <option value="武侠">武侠</option>
                                <option value="修仙">修仙</option>
                                <option value="玄幻">玄幻</option>
                                <option value="穿越">穿越</option>
                                <option value="言情">言情</option>
                                <option value="学习">学习</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>2、请修改小说名字：<span style="color:red">*</span></label>
                            <input type="text" class="form-control s_name" name="sname" placeholder="" value="<?php echo ($data["sname"]); ?>">
                        </div>
                        <div class="form-group ">
                            <label>3、请修改小说作者：</label>
                            <input type="text" class="form-control" name="sauthor" placeholder="" value="<?php echo ($data["sauthor"]); ?>">
                        </div>
                        <div class="form-group ">
                            <label>4、点击量：</label>
                            <input type="text" class="form-control" name="shot" placeholder="" value="<?php echo ($data["shot"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>4、请修改小说简介：</label>
                            <textarea class="form-control" name="sintro" rows="6"><?php echo ($data["sintro"]); ?>"</textarea>
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