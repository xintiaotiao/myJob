<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/job/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/Public/job/css/style.css" rel="stylesheet">
    <link href="/Public/job/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]以下为分页css样式-->
      <style type="text/css">
          .b_white{
              color:white;
          }
          #id_show span {
              color: black;
              font-size: 16px;
              padding:5px;
              margin:10px;
          }
          #id_show a {
              color: white;
              font-size: 12px;
              padding:5px;
              margin:10px;
          }
      </style>
  </head>

  <body>

  <section id="container"  style="position:absolute;left:-100px;top:-50px;">
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4 style="text-align: center">发件箱列表展示</h4>
                              <hr/>
                              <div id="id_show" class="btn btn-success"><?php echo ($show); ?></div>
                              <a  class="fa fa-trash-o b_white del_all btn btn-danger btn-md pull-right">批量删除</a>
                              <a class="fa fa-trash-o b_white check_none btn btn-success btn-md pull-right">全不选</a>
                             <a class="fa fa-trash-o b_white check_all btn btn-success btn-md pull-right">全选</a>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> 用户名</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> 姓名</th>
                                  <th><i class="fa fa-bookmark"></i> 邮件主题</th>
                                  <th><i class="fa fa-bookmark"></i> 附件</th>
                                  <th><i class=" fa fa-edit"></i>是否已读</th>
                                  <th><i class=" fa fa-edit"></i>日期</th>
                                  <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                                          <td>
                                              <input type="checkbox" name="checkbox" value="<?php echo ($vol["id"]); ?>"/>
                                              <?php echo ($vol["id"]); ?>
                                          </td>
                                          <td class="hidden-phone"><?php echo ($vol["username"]); ?></td>
                                          <td class="hidden-phone"><?php echo ($vol["truename"]); ?></td>
                                          <td><?php echo (mb_substr($vol["title"],0,10,'utf8')); ?></td>
                                          <td>
                                              <span class="">
                                                  <?php if($vol["hasfile"] != 0): ?><a href="/index.php/Admin/Email/download/id/<?php echo ($vol["id"]); ?>">
                                                         <?php echo ($vol["filename"]); ?>
                                                      </a><?php endif; ?>
                                              </span>
                                          </td>
                                          <td>
                                              <span class="">
                                                  <?php if($vol["isread"] == 0): ?><span style="color:red;">未读</span>
                                                      <?php else: ?><span>已读</span><?php endif; ?>
                                              </span>
                                          </td>
                                          <td class="hidden-phone"><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
                                          <td>

                                              <a id-data="<?php echo ($vol["id"]); ?>" id-title="<?php echo ($vol["title"]); ?>" id-rec="<?php echo ($vol["username"]); ?>" class="fa fa-check b_white look btn btn-success ">查看</a>
                                              <a  href="/index.php/Admin/Email/del/id/<?php echo ($vol["id"]); ?>"  class="fa fa-trash-o b_white btn btn-danger dell">删除</a>

                                          </td>
                                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <!--<script src="/Public/job/js/jquery.js"></script>-->
     <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/Public/job/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/Public/job/js/jquery.scrollTo.min.js"></script>
    <script src="/Public/job/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="/Public/plugin/layer/layer/layer.js"></script>


    <!--common script for all pages-->
    <script src="/Public/job/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box
      //jquery实现邮件的查看、删除等操作
      //全选
      $('.check_all').on('click',function(){
          $(':checkbox').attr('checked',true);
      });
      //全不选
      $('.check_none').on('click',function(){
          $(':checkbox').attr('checked',false);
      });
      //删除选择的内容
     $('.del_all').on('click',function(){
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
                     window.location.href= '/index.php/Admin/Email/del/id/'+id;
                 }
         }

     });
      //点击查看，用layer弹窗实现邮件的阅读效果并实现修改邮件状态为已读
    $('.look').on('click',function(){
        //首先获取从数据库传递的值
        var id = $(this).attr('id-data');
        var title = $(this).attr('id-title');
        var rec = $(this).attr('id-rec');
        //iframe窗
        layer.open({
            type: 2,
            title: false,
            closeBtn: 0, //不显示关闭按钮
            shade: [0],
            area: ['340px', '215px'],
            offset: 'rb', //右下角弹出
            time: 500, //2秒后自动关闭
            anim: 2,
            content: ['//fly.layui.com/', 'no'], //iframe的url，no代表不显示滚动条
            end: function(){ //此处用于演示
                layer.open({
                    type: 2,
                    title:'<span class="btn btn-success disabled"> 邮件主题：'+title +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接收者：'+rec+'</span>',
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['999px', '500px'],
                    content: '/index.php/Admin/Email/showContent/id/'+id,
                    //只有是收件人才可以修改邮件的已读状态，发件人修改不合理
                    end:function(){
                       // window.location.href='/index.php/Admin/Email/sendIsread/id/'+id;
                    }
                });
            }
        });
    });


      $(function(){
          $('select.styled').customSelect();

      });

  </script>

  </body>
</html>