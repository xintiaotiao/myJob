<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>myJob登录界面</title>

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
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="/index.php/Admin/Public/login" method="post">
		        <h2 class="form-login-heading">myJob登录界面</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name = "name" placeholder="请输入用户名..." autofocus>
		            <br>
		            <input type="password" class="form-control" name ="password" placeholder="请输入密码..."><br>
					<input type="text" class="form-control" name="verify" placeholder="请输入验证码...">
					<span class=""><img src="/index.php/Admin/Public/verify" style="cursor: pointer;margin-top:15px;margin-bottom:10px " onclick="this.src='/index.php/Admin/Public/verify/'+Math.random()"+ /></span>

		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> 登录</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook disabled" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter disabled" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                现在还没有用户名?<br/>
		                <a class="" href="/index.php/Admin/Public/register">
		                   请点击此处注册
		                </a>
		            </div>
		
		        </div>
			  </form>
			<!-- Modal -->
				  <!--
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          -->
		          <!-- modal -->
		

	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Public/job/js/jquery.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/Public/job/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/Public/job/img/login-bg.jpg", {speed: 500});//可以自定义登录界面的背景图
		//用jquery实现点击回车实现提交功能
		$(document).keyup(function(event){
			if(event.keyCode ==13){
				$([type='submit']).trigger("click");
			}
		});
    </script>


  </body>
</html>