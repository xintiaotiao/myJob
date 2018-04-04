<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小说首页</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h3 class="text-success">欢迎来到Otis免费小说网站，这里都是纯净绿色的小说哦~~~~~</h3>
            </div>
            <div class="panel panel-info col-md-12">
                <div class="panel-heading">
                    <h3 class="panel-title btn btn-info disabled">本站免费小说列表：</h3>
                </div>
                <div class="panel-body">
                    <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><div class="col-md-10">
                            <div class="btn btn-info disabled"  style="margin-right:25px">第<?php echo ($k); ?>位：</div>
                            <span>点击量：</span><span style="color:red;font-size:18px;"><?php echo ($vol["shot"]); ?>次</span>
                            <div class="thumbnail">
                                <img src="/Public/job/img/weather.jpg"
                                     alt="通用的占位符缩略图">
                                <div class="caption">
                                    <h3><?php echo ($vol["sname"]); ?></h3>
                                    <p>作者：<?php echo ($vol["sauthor"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传时间:<?php echo (date('Y-m-d H:i:s',$vol["saddtime"])); ?></p>
                                    <p><?php echo ($vol["sintro"]); ?></p>
                                    <p>
                                        <a  class="btn btn-info" role="button" style="margin-right:25px" href="/index.php/Admin/Story/indexItem/id/<?php echo ($vol["id"]); ?>">开始阅读</a>
                                    </p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

        </div>
    </div>
</body>
</html>