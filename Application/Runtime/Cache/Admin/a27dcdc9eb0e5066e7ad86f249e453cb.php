<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑音乐</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            //用jquery实现表格的悬停效果
            $('tr').on('hover',function(){
                $('tr').removeClass('active');
                $(this).addClass('active');
            });
            //jquery代码实现点击提交表单
            $('.song_sub').addClass('disabled');//表单未改变的时候不能提交
            $('form').children().change(function(){
                $('.song_sub').removeClass('disabled');//表单改变后提交按钮激活
            });
            $('.song_sub').on('click',function(){
                $('form').submit();
            });
            $('.song_re').on('click',function(){
                $('form')[0].reset();
            });
            //juqery前端验证代码


        });
    </script>
</head>
<body>
    <!--自定义邮件界面，根据bootsrap制作，外面套一个面板，面板内部套表单，用来提交数据-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="" role="form" action ="/index.php/Admin/Music/medit" method="post">
                    <table class="table table-hover table-striped">
                        <caption class="h2" style="margin-top:20px">请编辑音乐的信息：</caption>
                        <thead>
                        <tbody>
                        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"  />
                        <tr class="">
                            <td>
                                <div class=" form-inline">
                                    <div class=" ">
                                        <label class="col-md-4" >1、请选择音乐类别(可选):</label>
                                        <select name="myself" class="form-control col-md-5" style="margin-left:15px">
                                            <option selected="selected" value="1">原唱</option>
                                            <option value="2">自创</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <div class=" form-inline">
                                    <div class=" ">
                                        <label class="col-md-4" >2、是否上架(可选):</label>
                                        <select name="ison" class="form-control col-md-5" style="margin-left:15px">
                                            <option selected="selected" value="1">上架</option>
                                            <option value="2">下架</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">3、歌名(可选)：</label>
                                    <div class="col-md-5">
                                        <input type="text"  name="ssong" value="<?php echo ($data["ssong"]); ?>" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">4、演唱者(可选)：</label>
                                    <div class="col-md-5">
                                        <input type="text"  name="songer" value="<?php echo ($data["songer"]); ?>" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                            <td>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">5、点击量(可选)：</label>
                                    <div class="col-md-5">
                                        <input type="text"  name="hot" value="<?php echo ($data["hot"]); ?>" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <div class="form-group">
                                    <label style="margin-left:15px">6、请输入歌曲对应的歌词(可选)：</label>
                                    <textarea class="form-control" rows="8" name="lyric"><?php echo ($data["lyric"]); ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-default song_sub">确认提交</button>
                                <button type="button" class="btn btn-default song_re">重新填写</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>