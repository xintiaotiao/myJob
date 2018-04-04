<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理小说</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            //juqery实现点击删除小说
            $('.s_del').on('click',function(){
                var id= $(this).attr('id-data');
                //alert(id);
                if(confirm('确定要删除吗？')){
                    window.location.href='/index.php/Admin/Story/del/id/'+id;
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-info col-md-12">
                <div class="panel-heading" style="text-align: center">
                    <h3 class="panel-title btn btn-info disabled">小说系统管理后台</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>名字</th>
                            <th>类型</th>
                            <th>作者</th>
                            <th>点击量</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr>
                                <td><?php echo ($k); ?></td>
                                <td><?php echo ($vol["sname"]); ?></td>
                                <td><?php echo ($vol["stype"]); ?></td>
                                <td><?php echo ($vol["sauthor"]); ?></td>
                                <td><?php echo ($vol["shot"]); ?></td>
                                <td><?php echo (date('Y-m-d H:i:s',$vol["saddtime"])); ?></td>
                                <td>
                                    <a href="/index.php/Admin/Story/edit/id/<?php echo ($vol["id"]); ?>" class="btn btn-info s_edit">编辑</a>
                                    <button id-data="<?php echo ($vol["id"]); ?>" class="btn btn-danger s_del">删除</button>
                                    <a href="/index.php/Admin/Story/managerItem/id/<?php echo ($vol["id"]); ?>" class="btn btn-success s_man">章节管理</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>