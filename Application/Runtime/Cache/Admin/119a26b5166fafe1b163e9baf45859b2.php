<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品欣赏</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            // 初始化轮播
            $(".start-slide").click(function(){
                $("#myCarousel").carousel('cycle');
            });
            // 停止轮播
            $(".pause-slide").click(function(){
                $("#myCarousel").carousel('pause');
            });
            // 循环轮播到上一个项目
            $(".prev-slide").click(function(){
                $("#myCarousel").carousel('prev');
            });
            // 循环轮播到下一个项目
            $(".next-slide").click(function(){
                $("#myCarousel").carousel('next');
            });
            $('#myCarousel').carousel({
                interval: 3000
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!--ps技术展示-->
            <div class="panel panel-info  col-md-10">
                <div class="panel-heading" style="text-align: center">
                    <span class="panel-title btn btn-info disabled " >自制ps图片欣赏集</span>
                </div>
                <div class="panel-body">

                    <div id="myCarousel" class="carousel slide" style="margin:15px auto">
                        <!-- 轮播（Carousel）指标 -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0"
                                class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                            <li data-target="#myCarousel" data-slide-to="8"></li>
                            <li data-target="#myCarousel" data-slide-to="9"></li>
                            <li data-target="#myCarousel" data-slide-to="10"></li>
                        </ol>
                        <!-- 轮播（Carousel）项目 -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="/Public/opus/ps/1.jpg" alt="First slide">
                                <div class="carousel-caption">ps调色、瘦腰、换脸</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/2.jpg" alt="First slide">
                                <div class="carousel-caption">ps调色、美白</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/3.jpg" alt="First slide">
                                <div class="carousel-caption">ps调色、美白</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/4.jpg" alt="Second slide">
                                <div class="carousel-caption">ps透明婚纱抠图</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/5.jpg" alt="Second slide">
                                <div class="carousel-caption">ps透明婚纱抠图</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/6.jpg" alt="Third slide">
                                <div class="carousel-caption">ps飘逸发丝抠图</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/7.jpg" alt="Third slide">
                                <div class="carousel-caption">ps换衣服、瘦身等</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/88.jpg" alt="Third slide">
                                <div class="carousel-caption">纯原图：好吧，来张自己的照片吧 ，不怕吓到人~~~~~~</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/10.jpg" alt="Third slide">
                                <div class="carousel-caption">纯原图：富士康同事照片--随意展1</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/11.jpg" alt="Third slide">
                                <div class="carousel-caption">纯原图：富士康同事照片--随意展2</div>
                            </div>
                            <div class="item">
                                <img src="/Public/opus/ps/12.jpg" alt="Third slide">
                                <div class="carousel-caption">纯原图：富士康同事照片--随意展3</div>
                            </div>

                        </div>
                        <!-- 轮播（Carousel）导航 -->
                        <a class="carousel-control left" href="#myCarousel"
                           data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel"
                           data-slide="next">&rsaquo;</a>
                        <!-- 控制按钮 -->
                        <div style="text-align:center;margin-top:15px">
                            <input type="button" class="btn start-slide btn-info" value="播放">
                            <input type="button" class="btn pause-slide btn-info" value="暂停">
                            <input type="button" class="btn prev-slide btn-info" value="上一页">
                            <input type="button" class="btn next-slide btn-info" value="下一页">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>