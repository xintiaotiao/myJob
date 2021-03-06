<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理小说章节</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <style>
        .s_page span{
            margin:auto 5px;
        }
        .s_page a{
            margin:auto 5px;
        }
    </style>
    <script>
        $(function(){
            //juqery实现点击删除小说
            $('.s_del').on('click',function(){
                var id= $(this).attr('id-data');
                //alert(id);
                if(confirm('确定要删除吗？')){
                    window.location.href='/index.php/Admin/Story/delItem/id/'+id;
                }
            });

            //全选
            $('.s_all').on('click',function(){
                $(':checkbox').attr('checked',true);
            });
            //全不选
            $('.s_none').on('click',function(){
                $(':checkbox').attr('checked',false);
            });
            //删除选择的内容
            $('.s_delall').on('click',function(){
                var id="";
                var obj= $(":checkbox:checked");
                for(var i=0;i<obj.length;i++){
                    id+=obj[i].value+',';
                }
                id=id.substr(0,id.length-1);
                //当有选择框的时候才跳转到删除页面
                if(id!=''){
                    //当确定删除后才跳转到删除页面
                    var bool=confirm("确定要删除已选的吗？");
                    if(bool){
                       // alert(id);
                        window.location.href= '/index.php/Admin/Story/delItem/id/ ' + id;
                    }
                }

            });
            //定制分页样式
            $('.s_page span').addClass('btn btn-danger');
            $('.s_page a').addClass('btn btn-info');
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="panel panel-info col-md-12">
            <div class="panel-heading" style="text-align: center">
                <h3 class="panel-title btn btn-info disabled"><?php echo ($data1["sname"]); ?>管理后台</h3>
            </div>
            <div class="panel-body">
                <div class='' style="text-align: right">
                <button class="btn btn-info s_all">全选</button>
                <button class="btn btn-info s_none">全不选</button>
                <button class="btn btn-danger s_delall">删除选择</button>
            </div>
                <div class='s_page' style="text-align: left">
                  <?php echo ($show); ?>
                </div>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>章节</th>
                        <th>标题</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data2)): $k = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr>
                            <td><input type="checkbox" value="<?php echo ($vol["id"]); ?>"/>&nbsp;&nbsp;&nbsp;<?php echo ($k); ?></td>
                            <td>第<?php echo ($vol["sort"]); ?>章</td>
                            <td><?php echo ($vol["title"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
                            <td>
                                <a href="/index.php/Admin/Story/editItem/id/<?php echo ($vol["id"]); ?>" class="btn btn-info s_edit">编辑</a>
                                <button id-data="<?php echo ($vol["id"]); ?>" class="btn btn-danger s_del">删除</button>
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