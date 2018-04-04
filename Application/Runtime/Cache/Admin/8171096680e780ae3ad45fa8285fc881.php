<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小说章节</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <style>
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h3 class="text-success">欢迎来到Otis免费小说网站，这里都是纯净绿色的小说哦~~~~~</h3>
            </div>
            <div class="panel panel-info col-md-12">
                <div class="panel-heading">
                    <span class="panel-title btn btn-info disabled" style="margin-left:350px">第<?php echo ($data["sort"]); ?>章&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($data["title"]); ?></span>
                    <span class="text-success pull-right" style="margin-top:15px;margin-right:250px;">添加时间：<?php echo (date('Y-m-d H:i:s',$data["addtime"])); ?></span>
                </div>
                <div class="panel-body">
                        <div class="col-md-12">
                            <div style="text-align: center;margin:15px auto">
                                <a href="/index.php/Admin/Story/pre/pid/<?php echo ($data["id"]); ?>" class="btn btn-sm">上一章</a>
                                <a href="/index.php/Admin/Story/back/sid/<?php echo ($data["id"]); ?>" class="btn btn-sm">返回目录</a>
                                <a href="/index.php/Admin/Story/next/nid/<?php echo ($data["id"]); ?>" class="btn btn-sm">下一章</a>
                            </div>
                            <pre>
                                <p class="text-success" style="font-size:17px"><?php echo ($data["content"]); ?></p>
                            </pre>
                            <div style="text-align: center;margin:15px auto">
                                <a href="/index.php/Admin/Story/pre/pid/<?php echo ($data["id"]); ?>" class="btn btn-sm">上一章</a>
                                <a href="/index.php/Admin/Story/back/sid/<?php echo ($data["id"]); ?>" class="btn btn-sm">返回目录</a>
                                <a href="/index.php/Admin/Story/next/nid/<?php echo ($data["id"]); ?>" class="btn btn-sm">下一章</a>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>