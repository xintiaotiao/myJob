<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小说章节</title>
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
                    <span class="panel-title btn btn-info disabled" style="margin-left:350px"><?php echo ($data1["sname"]); ?></span>
                    <span class="text-success pull-right" style="margin-top:15px;margin-right:250px;">作者：<?php echo ($data1["sauthor"]); ?></span>
                </div>
                <div class="panel-body">
                        <div class="col-md-12">
                            <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol2): $mod = ($i % 2 );++$i;?><div class="col-md-3 ">
                                    <a class="btn" href="/index.php/Admin/Story/indexDetail/id/<?php echo ($vol2["id"]); ?>" style="background-color:ghostwhite;margin:10px 5px">第<?php echo ($vol2["sort"]); ?>章&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vol2["title"]); ?></a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>