<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品欣赏</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!--flash作品展示-->
            <div class="panel panel-info  col-md-12" style="margin-top:30px;">
                <div class="panel-heading">
                    <h3 class="panel-title btn btn-info disabled" >自制flash作品欣赏</h3>
                </div>
                <div class="panel-body col-md-10" style="position:relative">

                    <div class="col-md-10">
                        <embed src="/Public/opus/flashOpus.swf"  width="880" height="680"></embed>
                        <span class="btn btn-danger disabled" style="text-align: left">
                            注意：这是一个swf文件，需要安装flash player插件才能正常播放。通常情况下，IE浏览器可以直接
                            播放，谷歌浏览器需要开启插件方可正常<br/>播放，而火狐浏览器则需要设置才能正常播放！
                        </span>
                        <span  class=" btn btn-success disabled" style="text-align: left;margin-top:15px" >
                            作品说明：这是一个完全用actionscript3.0开发的一个swf文件，as3.0也是一个完整的计算机语言体系，
                            支持面向对象、各种事件等。在2017年<br/>的时候，工作之余采用as3.0做了这个小视频，实现了音乐
                            的播放、视频的播放、图片的浏览、小说的阅读等各种小功能。flash功能的强大之处<br/>在于对图片的处理，
                            自定义各种动画效果，并有很强大的滤镜支持，在本例中就有3D、褶皱、浮雕等各种效果演示。也许并没有很大的实用及<br/>商业价值，
                            也就是娱乐而已，也供大家了解了我对计算机语言的了解和兴趣！
                        </span>
                    </div>

                </div>
                </div>
            </div>
    </div>

</body>
</html>