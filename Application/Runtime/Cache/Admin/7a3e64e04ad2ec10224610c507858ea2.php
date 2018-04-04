<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>音乐首页</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <style>
        .s_active{
            background-color:lightgray;
            font-size:14px;
            font-weight: bold;
        }
    </style>
    <script>
        $(function(){
            //用jquery实现表格的悬停效果
            $('tr').on('hover',function(){
                $('tr').removeClass('s_active');
                $(this).addClass('s_active');
            });
            //用jquery实现表格的悬停效果
            $('.m_hover').on('hover',function(){
                $('.m_hover').removeClass('s_active');
                $(this).addClass('s_active');
            });
            //隐藏和显示排行榜面板
            $('.t1_hide').on('click',function(){
                $('.b1_hide').toggle(500);
                $('.b2_hide').toggle(500);
            });
            $('.t2_hide').on('click',function(){
                $('.b1_hide').slideToggle(500);
                $('.b2_hide').slideToggle(500);
            });
//            //隐藏和显示全站和自定义音乐主题
//            $('.m_artist').on('click',function(){
//                $('.m_artist').hide(500);
//            });
//            $('.m_myself').on('click',function(){
//                $('.m_myself').show(500);
//            });
            //利用jquery动态为分页效果添加样式
            $('.page span').addClass('btn btn-danger');
            $('.page a').addClass('btn btn-info');

            //实现用户搜索功能
            $('.a_search').on('click',function(){
                var con1 = $('.in_search1').val();
                //alert(content);
                //当点击搜索后，以get方式，带着参数传递请求到php页面查询数据库
                window.location.href = '/index.php/Admin/Music/index/con1/'+con1;
            });

        });
    </script>
</head>
<body>
    <!--自定义邮件界面，根据bootsrap制作，外面套一个面板，面板内部套表单，用来提交数据-->
    <div class="container">
        <!--音乐标题部分-->
            <div class=" row col-md-12">
                <div class="text-success col-md-12 text-center">
                        <h3 class="lead">欢迎，来到Otis音乐网站，在这里，您可以自定义自己喜欢的音乐！</h3>
                    </div>
                </div>
            <hr/>
        <!--前10最热歌曲排行-->
            <div class="panel panel-info row col-md-6" style="margin:15px auto">
                <div class="panel-heading">
                    <button class="panel-title t1_hide btn btn-info btn-lg">前10最热歌曲排行榜</button>
                </div>
                <div class="panel-body b1_hide" style="display: none">

                    <table class="table table-condensed">
                        <tbody>
                        <?php if(is_array($data1)): $k = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol1): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k); ?></td>
                            <td><?php echo ($vol1["ssong"]); ?>--<?php echo ((isset($vol1["songer"]) && ($vol1["songer"] !== ""))?($vol1["songer"]):'无'); ?>--点击量：<?php echo ($vol1["hot"]); ?></td>
                            <td class="text-right"><a href="/index.php/Admin/Music/playMusic/id/<?php echo ($vol1["id"]); ?>" target="_blank" class="btn btn-sm btn-info">在线试听</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>

                </div>
         </div>
        <!--前10最新歌曲排行-->
        <div class="panel panel-info  row col-md-6" style="margin:15px auto">
            <div class="panel-heading">
                <button class="panel-title t2_hide  btn btn-info btn-lg">前10最新歌曲排行榜</button>
            </div>
            <div class="panel-body b2_hide" style="display:none">
                <table class="table table-condensed">
                    <tbody>
                    <?php if(is_array($data2)): $k = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol2): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k); ?></td>
                            <td><?php echo ($vol2["ssong"]); ?>--<?php echo ((isset($vol2["songer"]) && ($vol2["songer"] !== ""))?($vol2["songer"]):'无'); ?>--<?php echo (date('Y-m-d H:i:s',$vol2["addtime"])); ?></td>
                            <td class="text-right"><a href="/index.php/Admin/Music/playMusic/id/<?php echo ($vol2["id"]); ?>" target="_blank"  class="btn btn-sm btn-info">在线试听</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--数据库总所有状态为显示的音乐列表-->
        <div class="panel panel-info row col-md-12" style="margin:20px auto">
            <div class="panel-heading">
                <button class="panel-title text-center btn btn-info disabled">全站音乐区</button>
                <div class="col-md-2 pull-right">
                    <button class="a_search btn btn-info">搜索</button>
                </div>
                <div class="col-md-3 pull-right">
                    <input type="input" class="form-control in_search1" value="<?php echo ($data3["con1"]); ?>" placeholder="请输入歌曲关键词..." />
                </div>
                </div>
            </div>
            <div class="panel-body m_artist">

                <div class="row">
                    <?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol3): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4 m_hover">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>歌名:<?php echo ((isset($vol3["ssong"]) && ($vol3["ssong"] !== ""))?($vol3["ssong"]):'无信息'); ?></p>
                                    <p>演唱者:<?php echo ((isset($vol3["songer"]) && ($vol3["songer"] !== ""))?($vol3["songer"]):'无信息'); ?></p>
                                    <p>上传者:<?php echo ((isset($vol3["uname"]) && ($vol3["uname"] !== ""))?($vol3["uname"]):'无信息'); ?></p>
                                    <p>点击量:<?php echo ((isset($vol3["hot"]) && ($vol3["hot"] !== ""))?($vol3["hot"]):'无信息'); ?></p>
                                    <p>上传时间:<?php echo (date('Y-m-d H:i:s',$vol3["addtime"])); ?></p>
                                    <p>
                                        <a href="/index.php/Admin/Music/playMusic/id/<?php echo ($vol3["id"]); ?>" target="_blank" class="btn btn-info" role="button">
                                           试听
                                        </a>
                                        <a  href="/index.php/Admin/Music/download/id/<?php echo ($vol3["id"]); ?>" class="btn btn-info" role="button">
                                            下载
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="page" style="margin:15px auto">
                    <?php echo ($show); ?>
                </div>
            </div>
        <!--用户自定义音乐列表-->
        <div class="panel panel-info row col-md-12" style="margin:20px auto;">
            <div class="panel-heading">
                <button class="panel-title text-center btn btn-info disabled">用户自定义音乐专区</button>
            </div>
            <div class="panel-body m_myself" style="">

                <div class="row">
                    <?php if(is_array($data4)): $i = 0; $__LIST__ = $data4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol4): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4 m_hover">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>歌名:<?php echo ((isset($vol4["ssong"]) && ($vol4["ssong"] !== ""))?($vol4["ssong"]):'无信息'); ?></p>
                                    <p>演唱者:<?php echo ((isset($vol4["songer"]) && ($vol4["songer"] !== ""))?($vol4["songer"]):'无信息'); ?></p>
                                    <p>上传者:<?php echo ((isset($vol4["uname"]) && ($vol4["uname"] !== ""))?($vol4["uname"]):'无信息'); ?></p>
                                    <p>点击量:<?php echo ((isset($vol4["hot"]) && ($vol4["hot"] !== ""))?($vol4["hot"]):'无信息'); ?></p>
                                    <p>上传时间:<?php echo (date('Y-m-d H:i:s',$vol4["addtime"])); ?></p>
                                    <p>
                                        <a href="/index.php/Admin/Music/playMusic/id/<?php echo ($vol4["id"]); ?>" target="_blank" class="btn btn-info" role="button">
                                            试听
                                        </a>
                                        <a  href="/index.php/Admin/Music/download/id/<?php echo ($vol4["id"]); ?>" class="btn btn-info" role="button">
                                            下载
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="page" style="margin:15px auto">
                    <?php echo ($show4); ?>
                </div>
            </div>
        </div>

        <div class="text-center row col-md-12">
            copyRight 2018 - Otis <a href="javascript: "  title="Otis">Otis倾心制作</a><i class="fa fa-angle-up"></i></a>
        </div>
        </div>


    </div>

</body>
</html>