<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>音乐管理后台</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/plugin/utf8-php/lang/zh-cn/zh-cn.js"></script>

    <style>
        tr{
            text-align:center;
        }
        .btn_po button{
            margin:0px 10px;
        }
        .m_page span{
            font-size:16px;
        }
        .m_page a{
            margin:auto 10px;
            font-size:16px;
        }
    </style>

    <script>
        var id="";
        $(function(){
            var ue = UE.getEditor('editor');
            //用jquery代码实现为分页标签添加样式
            $('.m_page span').addClass('btn btn-danger btn-xs');
            $('.m_page a').addClass('btn btn-info btn-xs');
            //jquery代码实现鼠标悬停效果
            $('tr').hover(function(){
                $('tr').removeClass('success');
                $(this).addClass('success');
            });
            //jquery实现checkbox的全选、全不选、删除等功能
            //全选
            $('.sel_all').on('click',function(){
                $(':checkbox').attr('checked',true);
            });
            //全不选
            $('.sel_none').on('click',function(){
                $(':checkbox').attr('checked',false);
            });
            //单个删除，先用jquery做过alert弹窗确定，是否要删除
            $('.o_del').click(function(){
                if(confirm("确定要删除吗?")){
                    return true;
                }else{
                    return false;
                }
            });
            //删除所有
            $('.a_del').click(function(){

                var obj= $(":checkbox:checked");
                for(var i=0;i<obj.length;i++){
                    id+=obj[i].value+',';
                }
                id=id.substr(0,id.length-1);
                //alert(id);
                if(confirm("确定要删除吗?")){
                   // return true;
                    window.location.href='/index.php/Admin/Music/mdel/id/'+id;
                }else{
                    return false;
                }
            });
            //ajax获取差评次数
            $('.c_ajax').on('click',function(){
                var id = $(this).attr('id-data');
               // alert(id);
                $.ajax({
                    type: "GET",
                    dataType: 'text',
                    async:true,
                    url: "/index.php/Admin/Music/cBad/id/"+id,
                    success: function(data){
                       alert(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <!--自定义邮件界面，根据bootsrap制作，外面套一个面板，面板内部套表单，用来提交数据-->
    <div class="container">
        <div class="row">
            <div class="panel panel-info col-md-12">
                <div class="panel-heading  ">
                    <button class="pull-center btn btn-info disabled" style="margin-left:350px">音乐网站管理后台</button>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <td colspan="10" class="btn_po">
                                <button class="btn btn-danger btn-xs pull-right a_del">删除全部</button>
                                <button class="btn btn-info btn-xs pull-right sel_none">全不选</button>
                                <button class="btn btn-info btn-xs pull-right sel_all">全选</button>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align: center">序号</th>
                            <th style="text-align: center">上传者</th>
                            <th style="text-align: center">歌名</th>
                            <th style="text-align: center">演唱者</th>
                            <th style="text-align: center">是否原唱</th>
                            <th style="text-align: center">是否上架</th>
                            <th style="text-align: center">点击量</th>
                            <th style="text-align: center">评论次数</th>
                            <th style="text-align: center">查看评论</th>
                            <th style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr>
                                    <td><input type="checkbox" value="<?php echo ($vol["id"]); ?>" />&nbsp;&nbsp;<?php echo ($k); ?></td>
                                    <td><?php echo ($vol["username"]); ?></td>
                                    <td><?php echo ($vol["ssong"]); ?></td>
                                    <td><?php echo ($vol["songer"]); ?></td>
                                    <td><?php if($vol["myself"] == 1): ?>原唱<?php else: ?>自创<?php endif; ?></td>
                                    <td><?php if($vol["ison"] ==1): ?>上架<?php else: ?>下架<?php endif; ?></td>
                                    <td><?php echo ($vol["hot"]); ?></td>
                                    <td><span class="btn btn-info btn-xs c_ajax" id-data="<?php echo ($vol["id"]); ?>">aJax</span></td>
                                    <td><a href="/index.php/Admin/Music/playMusic/id/<?php echo ($vol["id"]); ?>" target="_blank" class="btn btn-info btn-xs c_show">查看</a></td>
                                    <td><a href="/index.php/Admin/Music/medit/id/<?php echo ($vol["id"]); ?>" class="btn btn-info btn-xs" style="margin:auto 15px">编辑</a><a href="/index.php/Admin/Music/mdel/id/<?php echo ($vol["id"]); ?>" class="btn btn-danger btn-xs o_del">删除</a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="m_page">
                        <?php echo ($show); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>