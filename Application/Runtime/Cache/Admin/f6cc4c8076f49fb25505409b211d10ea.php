<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css"> -->
	<link rel="stylesheet" type="text/css" href="/Public/css/index.css">
	<script src="/Public/public/js/jquery-3.1.1.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/public/js/banner.js"></script>
	<script type="text/javascript">
		$(function(){
			//导航经过改变宽度和颜色
			$(".headnav li").click(function(){
				var index = $(this).index();
				//alert(index);
				$(this).addClass("current_menu").siblings().removeClass('current_menu');
				//头部导航和左边导航对应
				$(".leftmenu").find(".leftmenu_0").eq(index).removeClass("hidden").siblings().addClass('hidden');

			});
			//头部导航和左边导航对应
			// bannerplay($(".leftmenu"),$(".leftmenu_0"),$(".headnav li"),4,false,2);

			//左边导航点击上拉
			$(".leftmenu dl dt").click(function(){
				if(false == $(this).siblings("dd").is(":visible"))else{
					$(this).css('background-position','right 0px');//可见点击后变红色
				}

				$(this).siblings('dd').slideToggle('fast').siblings('dt');//.end()

			});
			//点击隐藏菜单
			var i=1;

			//替换文字并显示隐藏左侧导航
			function replace(){
				var i=j=1;
				var x=$(".link_1");
				var y=$(".ton");
				y.click(function(){
					i++;
					if(i%2==0){
						//alert(i)
						y.text("显示菜单");
						$('#rightmain').addClass('rightmain1').removeClass('rightmain');
					}else{
						y.text("隐藏菜单");
						$('#rightmain').addClass('rightmain').removeClass('rightmain1');
					}

				})
				x.click(function(){
					j++;
					//alert(j);
					j%2==0 ? $(".leftmenu").css('display','none') : $(".leftmenu").css('display','block');
				})
			}
			replace();

			//左侧导航切换出右侧页面ifream
			$(".leftmenu dl dd ul li a").click(function(){
				var _link = $(this).attr('_link');
				//alert(_link)
				$("#main").attr('src',_link);
				$(this).addClass('current-menuleft').parent().siblings().children().removeClass('current-menuleft');
				$(this).parents('dl').siblings().find('dd ul li a').removeClass('current-menuleft');

			});
		});


	</script>
	<title>后台管理系统</title>
</head>
<body>

	<div class="head">
		<div class="headlogo pull-left">
			<h1><a href="javascript:;">菜单管理</a></h1>
		</div> 
		<ul class="headnav pull-left">
			<li class="menu_0 current_menu">
				<a href="javascript:;">菜单管理</a>
			</li>
			<li class="menu_1">
				<a href="javascript:;">模块管理</a>
			</li>
			<li class="menu_2">
				<a href="javascript:;">系统设置</a>
			</li>
			<li class="menu_3">
				<a href="javascript:;">扩展管理</a>
			</li>
		</ul>
		<ul class="headlink pull-right">
			<li class="link_0"><a href="javascript:;">您好，admin</a></li>
			<li class="link_1"><a href="javascript:;"><span class="ton">隐藏菜单</span></a></li>
			<li class="link_2"><a href="javascript:;">首页</a></li>
			<li class="link_3"><a href="javascript:;">帮助</a></li>
			<li class="link_4"><a href="javascript:;">退出</a></li>
		</ul>
	</div>
	<!-- 头部页面结束 -->
	<div class="leftmenu">
		<div class="leftmenu_0">
			<dl>
				<dt>栏目管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="/Public/column.html">栏目管理</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>内容管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="/Public/introduce.html">公司介绍</a></li>
						<li><a href="javascript:;">新闻中心</a></li>
						<li><a href="javascript:;">产品展示</a></li>
						<li><a href="javascript:;">公司相册</a></li>
						<li><a href="javascript:;">联系我们</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>快捷面板</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">广告管理</a></li>
						<li><a href="javascript:;">公告管理</a></li>
						<li><a href="javascript:;">友情链接</a></li>
						<li><a href="javascript:;">留言本管理</a></li>
						<li><a href="javascript:;">评论管理</a></li>
						<li><a href="javascript:;">清除系统缓存</a></li>
					</ul>
				</dd>
			</dl>

		</div>
		<!-- leftmenu_0结束 -->
		<div class="leftmenu_0 hidden">
			<dl>
				<dt>内置模块</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">自由模块管理</a></li>
						<li><a href="javascript:;">广告管理</a></li>
						<li><a href="javascript:;">专题管理</a></li>
						<li><a href="javascript:;">公告管理</a></li>
						<li><a href="javascript:;">友情链接</a></li>
						<li><a href="javascript:;">留言本管理</a></li>
						<li><a href="javascript:;">评论管理</a></li>

					</ul>
				</dd>
			</dl>
			<dl>
				<dt>其他模块</dt>
				<dd>
					<ul>
						<li><a href="javascript:;">其他</a></li>
					</ul>
				</dd>
			</dl>
			
		</div>
		<!-- leftmenu_1结束 模块管理 -->
		<div class="leftmenu_0 hidden">
			<dl>
				<dt>系统设置</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="/Public/webset.html">网站设置</a></li>
						<li><a href="javascript:;">伪静态|缓存设置</a></li>
						<li><a href="javascript:;">在线客服设置</a></li>
						<li><a href="javascript:;">清除系统缓存</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>静态缓存</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">一键更新全站</a></li>
						<li><a href="javascript:;">更新首页</a></li>
						<li><a href="javascript:;">更新栏目</a></li>
						<li><a href="javascript:;">更新文档</a></li>
						<li><a href="javascript:;">更新专题</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>会员管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">会员管理</a></li>
						<li><a href="javascript:;">会员组管理</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>管理员管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">系统用户管理</a></li>
						<li><a href="javascript:;">用户组组管理</a></li>
						<li><a href="javascript:;">节点列表</a></li>
					</ul>
				</dd>
			</dl>

		</div>
		<!-- leftmenu_2系统设置结束 -->
		<div class="leftmenu_0 hidden">
			<dl>
				<dt>扩展管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;">模型管理</a></li>
						<li><a href="javascript:;">菜单管理</a></li>
						<li><a href="javascript:;">数据库管理</a></li>
						<li><a href="javascript:;">联动管理</a></li>
						<li><a href="javascript:;">区域链接</a></li>
						<li><a href="javascript:;">数据元管理</a></li>
						<li><a href="javascript:;">已传文件管理</a></li>

					</ul>
				</dd>
			</dl>
			<dl>
				<dt>我的账户</dt>
				<dd>
					<ul>
						<li><a href="javascript:;">修改我的信息</a></li>
						<li><a href="javascript:;">修改密码</a></li>
					</ul>
				</dd>
			</dl>
			
		</div>
	</div>
	<!-- 左边导航结束 -->
	<div class="rightmain" id="rightmain">
		<div class="rightcontent">
			<iframe src="" id="main" name="main" frameborder="0" scrolling="yes"></iframe>
		</div>
	</div>


</body>
</html>