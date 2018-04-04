<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加小说</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        //控制表单提交jquery代码
        $(function(){
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
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-info col-md-5">
                <div class="panel-heading" style="text-align: center">
                    <h3 class="panel-title btn btn-info disabled">添 加 小 说</h3>
                </div>
                <div class="panel-body">
                    <form action="/index.php/Admin/Story/add" method="post">
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
                            <label>2、请输入小说名字：<span style="color:red">*</span></label>
                            <input type="text" class="form-control s_name" name="sname" placeholder="">
                        </div>
                        <div class="form-group ">
                            <label>3、请输入小说作者：</label>
                            <input type="text" class="form-control" name="sauthor" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>4、请输入小说简介：</label>
                            <textarea class="form-control" name="sintro" rows="6"></textarea>
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