<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>myJob首页</title>
    <!-- Bootstrap core CSS -->
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/job/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/Public/job/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/Public/job/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/Public/job/lineicons/style.css">

    
    <!-- Custom styles for this template -->
    <link href="/Public/job/css/style.css" rel="stylesheet">
    <link href="/Public/job/css/style-responsive.css" rel="stylesheet">

    <script src="/Public/job/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <div id="b_hide">


        <!--//引入头部文件-->
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="隐藏/显示左边栏"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>我的主页</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <button data-toggle="dropdown" class="dropdown-toggle  btn btn-sm btn-info" style="cursor: default">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-theme"></span>
                </button>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 4 pending tasks</p>
                    </li>
                    <li>
                        <a href="index.html#">
                            <div class="task-info">
                                <div class="desc">DashGum Admin Panel</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <div class="task-info">
                                <div class="desc">Database Update</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <div class="task-info">
                                <div class="desc">Product Development</div>
                                <div class="percent">80%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <div class="task-info">
                                <div class="desc">Payments Sent</div>
                                <div class="percent">70%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="sr-only">70% Complete (Important)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown" style="margin-left:20px">
                <button data-toggle="dropdown" class="dropdown-toggle btn btn-sm btn-info" id="message" >
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme" id="is_read"></span>
                </button>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">&nbsp;&nbsp;最近的5个未读邮件如下：</p>
                    </li>
                    <li>
                        <button class="btn btn-success btn-sm to_box">
                            <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from" style="margin-right:37px;">发件人</span>
                                        <span class="time" style="margin-right:37px">邮件主题</span>
                                        </span>
                                        <span class="message">
                                            发送时间
                                        </span>
                        </button>
                    </li>

                        <li>
                            <button class="btn btn-success btn-sm to_box">
                                <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from mes_name" style="margin-right:10px;">Dan Rogers</span>
                                        <span class="time mes_title" style="margin-right:20px">2 hrs.</span>
                                        </span>
                                        <span class="message mes_time">
                                            Love your new Dashboard.
                                        </span>
                            </button>
                        </li>
                    <li>
                        <button class="btn btn-success btn-sm to_box">
                            <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from mes_name" style="margin-right:10px;">Dan Rogers</span>
                                        <span class="time mes_title" style="margin-right:20px">2 hrs.</span>
                                        </span>
                                        <span class="message mes_time">
                                            Love your new Dashboard.
                                        </span>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-success btn-sm to_box">
                            <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from mes_name" style="margin-right:10px;">Dan Rogers</span>
                                        <span class="time mes_title" style="margin-right:20px">2 hrs.</span>
                                        </span>
                                        <span class="message mes_time">
                                            Love your new Dashboard.
                                        </span>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-success btn-sm to_box">
                            <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from mes_name" style="margin-right:10px;">Dan Rogers</span>
                                        <span class="time mes_title" style="margin-right:20px">2 hrs.</span>
                                        </span>
                                        <span class="message mes_time">
                                            Love your new Dashboard.
                                        </span>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-success btn-sm to_box">
                            <span class="photo"></span>
                                        <span class="subject">
                                        <span class="from mes_name" style="margin-right:10px;">Dan Rogers</span>
                                        <span class="time mes_title" style="margin-right:20px">2 hrs.</span>
                                        </span>
                                        <span class="message mes_time">
                                            Love your new Dashboard.
                                        </span>
                        </button>
                    </li>

                </ul>
            </li>
            <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu" style="list-style: none">
            <!--<li>-->
                <!--<input type="text" value="" placeholder="请输入字体或字体图标..." class="logout" id="b_word" />-->
                <!--<input type="text" value=""  placeholder="请输入次数(默认为2)..." class="logout" id="b_num" />-->
                <!--<span class="logout  b_change" style="cursor: pointer">修改</span>-->

            <!--</li>-->
            <!--<li><span class="logout btn b_beauty">装饰效果</span></li>-->
            <li><span class="logout btn">欢迎您，<?php echo (session('username')); ?>!</span> </li>
            <li><a class="logout" id="id_logout" href="/index.php/Admin/Index/logout">退出！</a></li>
        </ul>

    </div>
</header>
<!--header end-->
</body>
</html>

       <!-- //引入左侧菜单栏}-->
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="/index.php/Admin/Index/index"><img src="/Public/job/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">Otis    yang</h5>

            <!--自定义邮件功能模板-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-hdd-o"></i>
                    <span>邮件系统</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Email/sendMail"  class="to_iframe" target="iframe">发送邮件</a></li>
                    <li><a  href="/index.php/Admin/Email/recBox"    class="to_iframe" target="iframe" >收件箱</a></li>
                    <li><a  href="/index.php/Admin/Email/sendBox"   class="to_iframe" target="iframe">发件箱</a></li>
                </ul>
            </li>

            <!--自定义小说功能模板-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>小说网站</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Story/index" class="" target="iframe">小说首页</a></li>
                    <li><a  href="/index.php/Admin/Story/add" class="" target="iframe">添加小说</a></li>
                    <li><a  href="/index.php/Admin/Story/addItem" target="iframe">添加章节</a></li>
                    <li><a  href="/index.php/Admin/Story/manager" target="iframe">管理小说</a></li>
                </ul>
            </li>

            <!--自定义音乐功能模板-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-music"></i>
                    <span>音乐网站</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Music/index"  target="iframe" class="">首页展示</a></li>
                    <li><a  href="/index.php/Admin/Music/add" target="iframe">添加音乐</a></li>
                    <li><a  href="/index.php/Admin/Music/edit" target="iframe">管理音乐</a></li>
                </ul>
            </li>

            <!--自定义作品欣赏功能模板-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-flag"></i>
                    <span>作品欣赏</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Opus/flash" target="iframe" class="">flash欣赏</a></li>
                    <li><a  href="/index.php/Admin/Opus/ps" target="iframe" class="">ps欣赏</a></li>

                </ul>
            </li>

            <!--web在线聊天工具-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-ban"></i>
                    <span>web在线聊天</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/WebChat/index" target="iframe" class="">开始聊天</a></li>


                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/general" name="iframe">General</a></li>
                    <li><a  href="/index.php/Admin/Index/buttons">Buttons</a></li>
                    <li><a  href="/index.php/Admin/Index/panels">Panels</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/calendar">Calendar</a></li>
                    <li><a  href="/index.php/Admin/Index/gallery">Gallery</a></li>
                    <li><a  href="/index.php/Admin/Index/todo_list">Todo List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Extra Pages</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/blank">Blank Page</a></li>
                    <li><a  href="/index.php/Admin/Index/login">Login</a></li>
                    <li><a  href="/index.php/Admin/Index/lock_screen">Lock Screen</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Forms</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/form_component">Form Components</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/basic_table">Basic Table</a></li>
                    <li><a  href="/index.php/Admin/Index/responsive_table">Responsive Table</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub">
                    <li><a  href="/index.php/Admin/Index/morris">Morris</a></li>
                    <li><a  href="/index.php/Admin/Index/chartjs">Chartjs</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
</body>
</html>

      <!--main content start-->
          <section id="main-content">
              <section class="wrapper">
                  <!--添加一个iframe层，用来加载主题页面，是模板分离技术的应用-->
                  <iframe  src="/index.php/Admin/Index/introduce" id="iframe" class="snow"  name="iframe" frameborder="0" scrolling="auto" height="520px"  width="100%"></iframe>
              </section>
          </section>


      <!--//引入尾部文件-->
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2014 - Alvarez.is - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
        <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</body>
</html>
      </div>
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Public/job/js/jquery.js"></script>
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/Public/job/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/Public/job/js/jquery.scrollTo.min.js"></script>
    <script src="/Public/job/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/Public/job/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/Public/job/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="/Public/job/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/Public/job/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="/Public/job/js/sparkline-chart.js"></script>    
	<script src="/Public/job/js/zabuto_calendar.js"></script>	
    <!--引入雪花特效的js文件-->



	<script type="text/javascript">
        //关闭展示首页后的提示框
//        $(document).ready(function () {
//        var unique_id = $.gritter.add({
//            // (string | mandatory) the heading of the notification
//            title: 'Welcome to Dashgum!',
//            // (string | mandatory) the text inside the notification
//            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
//            // (string | optional) the image to display on the left
//            image: '/Public/job/img/ui-sam.jpg',
//            // (bool | optional) if you want it to fade out on its own or just sit there
//            sticky: true,
//            // (int | optional) the time you want it to be alive for before fading out
//            time: '',
//            // (string | optional) the class name you want to apply to that specific message
//            class_name: 'my-sticky-class'
//        });
//
//        return false;
//        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
            //点击实现退出登录
            $('#id_logout').on('click',function(){
                top.location.href='/index.php/Admin/Index/logout';
            });

        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        //jquery加ajax代码实现动态获取未读邮件效果
        $(function(){
            setInterval(getCount,5000);
        });
        function getCount(){
            $.get('/index.php/Admin/Email/getEmail',function(data){
                $('#is_read').html(data);
            });
        }
        //ajax获取未读邮件前5条记录
        $('#message').on('click',function(){
            //编写ajax代码
            $.ajax({
                url:"/index.php/Admin/Email/getMessage",    //请求的url地址
                dataType:"text",   //返回格式为json
                type:"GET",   //请求方式 get 或者post
                success:function(data){
                    //请求成功时，先处理json数据
                    var rjson = eval('('+data+ ')');
                    var mes_name=$('.mes_name');
                    var mes_time=$('.mes_time');
                    var mes_title=$('.mes_title');
                    //alert(getLocalTime(1293072805));
                    //利用遍历方法，用dom操作为节点赋值
                    for(var i=0;i<rjson.length;i++){
                        mes_name[i].innerText=rjson[i].sender;
                        mes_time[i].innerText=getLocalTime(rjson[i].addtime);//自定义函数转换时间戳格式为日期时间
                        mes_title[i].innerText=rjson[i].title;
                    }
//                    if(data){
//                        alert('hello');
//                    }


                }
            });
           // window.location.href = '/index.php/Admin/Email/getMessage';
        });
        //自定义格式化时间戳函数
        function getLocalTime(nS) {
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
        }
        //alert(getLocalTime(1293072805));
        //点击邮件下拉列表，跳转到当前用户的收件箱中
        $('.to_box').on('click',function(){
            window.location.href ='<?php echo U("Email/recBox");?>';
        });

        //添加装饰效果之满屏飘雪
        $(function(){
//            //自定义装饰效果jquery代码
//            var ob_word =document.getElementById('b_word');//这里用jquery不行，专用js  dom操作反而可以，见鬼！
//            var ob_num =document.getElementById('b_num');
//            var b_word =$('#b_word').val();
//            var b_num =ob_num.value;
//            alert(b_word);
//            if(b_word ==null ||b_word == undefined){
//                b_word='*';
//            }
//            if(b_num ==null ||b_num == undefined){
//                b_num=2;
//            }
//            $('.b_change').on('click',function(){
//                 alert(b_word);
//                alert(b_num);
//                for(var i=0;i<b_num;i++){
//                    snow();//调用代码，如此简单即可实现
//                }
//            });
            //点击按钮去除装饰
            var b_word='<span class="fa fa-circle"></span>';
            var b_num=1;
            for(var i=0;i<b_num;i++){
                snow();//调用代码，如此简单即可实现
            }
            function snow() {

                //  1、定义一片雪花模板
                var flake = document.createElement('div');
                // 雪花字符 ❄❉❅❆✻✼❇❈❊✥✺
                flake.innerHTML = '❇';
                flake.style.cssText = 'position:absolute;';

                //获取页面的高度 相当于雪花下落结束时Y轴的位置
                var documentHieght = window.innerHeight+50;
                //获取页面的宽度，利用这个数来算出，雪花开始时left的值
                var documentWidth = window.innerWidth;

                //定义生成一片雪花的毫秒数
                var millisec = 50;
                //2、设置第一个定时器，周期性定时器，每隔一段时间（millisec）生成一片雪花；
                setInterval(function() { //页面加载之后，定时器就开始工作
                    //随机生成雪花下落 开始 时left的值，相当于开始时X轴的位置
                    var startLeft = Math.random() * documentWidth;

                    //随机生成雪花下落 结束 时left的值，相当于结束时X轴的位置
                    var endLeft = Math.random() * documentWidth;

                    //随机生成雪花大小
                    var flakeSize = 5 + 20 * Math.random();

                    //随机生成雪花下落持续时间
                    var durationTime = 4000 + 7000 * Math.random();

                    //随机生成雪花下落 开始 时的透明度
                    var startOpacity = 0.5 + 0.4 * Math.random();

                    //随机生成雪花下落 结束 时的透明度
                    var endOpacity = 0.1 + 0.4 * Math.random();

                    //随机生成雪花下落 结束 时的透明度
                    var color = '#'+Math.ceil(999999 * Math.random());

                    //克隆一个雪花模板
                    var cloneFlake = flake.cloneNode(true);

                    //第一次修改样式，定义克隆出来的雪花的样式
                    cloneFlake.style.cssText += `
            left: ${startLeft}px;
            opacity: ${startOpacity};
            font-size:${flakeSize}px;
            color:${color};
            top:-25px;
               transition:${durationTime}ms;
           `;
                    //拼接到页面中
                    //document.body.appendChild(cloneFlake);
                    var obj = document.getElementById('b_hide');
                    obj.appendChild(cloneFlake)
//                    $('.b_beauty').click(function(){
//                       obj.parent.removeChild(obj);
//                    });

                    //设置第二个定时器，一次性定时器，
                    //当第一个定时器生成雪花，并在页面上渲染出来后，修改雪花的样式，让雪花动起来；
                    setTimeout(function() {
                        //第二次修改样式
                        cloneFlake.style.cssText += `
                left: ${endLeft}px;
                top:${documentHieght}px;
                opacity:${endOpacity};
                color:${color};
              `;

                        //4、设置第三个定时器，当雪花落下后，删除雪花。
                        setTimeout(function() {
                            cloneFlake.remove();
                        }, durationTime);
                    }, 0);

                }, millisec);
            }
            });
    </script>
  

  </body>
</html>