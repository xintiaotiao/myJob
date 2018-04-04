<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>音乐在线试听</title>
    <link href="/Public/job/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/job/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/job/js/bootstrap.min.js"></script>
    <!--jPlayer 插件引入的资源文件-->
    <link href="/Public/plugin/jplayer/css/blue.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/plugin/jplayer/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/plugin/jplayer/js/jquery.jplayer.js"></script>
    <script type="text/javascript" src="/Public/plugin/jplayer/js/jplayer.playlist.min.js"></script>
    <script type="text/javascript" src="/Public/plugin/jplayer/js/lrc.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline:none;
        }
        ul, ol, dl {
            list-style: none;
        }
        .music_box{margin:0px 70px;width:422px;}
        .content {width: 602px;height:400px;overflow:hidden;padding:10px;}
        #lrc_list{margin:10px auto;background-color: #e2e3e3;}
        #lrc_list li{font:normal 14px/2.1 'microsoft yahei';text-align:center;}
        #lrc_list li.hover {color:deeppink;font-weight:bold;font-size: 16px}
    </style>
    <script>
        //音乐播放器及歌词同步
        $(function(){
            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        mp3:"<?php echo ($data["ssongpath"]); ?>" //mp3的播放地址
                    });
                    //自动播放要在事件触发的时候才可以，比如ready
                    $(this).jPlayer('play');
                    //播放列表
                    new jPlayerPlaylist({
                        jPlayer: "#jquery_jplayer_1",
                       // cssSelectorAncestor: "#jp_container_1"
                    }, [
                        {
                            title:"Big Buck Bunny Trailer",
                            artist:"Blender Foundation",
                            free:true,
                            mp3: "<?php echo ($data["ssongpath"]); ?>",
                        }

                    ]);
                },
                timeupdate: function(event) {
                    if(event.jPlayer.status.currentTime==0){
                        time = "";
                    }else {
                        time = event.jPlayer.status.currentTime;
                    }
                },
                play: function(event) {
                    //点击开始方法调用lrc。start歌词方法 返回时间time
                    $.lrc.start($('#lrc_content').val(), function() {
                        return time;
                    });
                },
                ended:function(event){
                    $("#lrc_list").removeAttr("style").html("<li>歌曲播放完毕！</li>");
                },
                swfPath: "/js",  		//存放jplayer.swf的决定路径
                solution:"html, flash", //支持的页面
                supplied: "mp3",		//支持的音频的格式
                wmode: "window"
            });
        });


    </script>
</head>
<body>
    <!--自定义邮件界面，根据bootsrap制作，外面套一个面板，面板内部套表单，用来提交数据-->
    <div class="container">
        <div class="row">
            <div class="jp-playlist">
                <ul>
                    <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                    <li></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="panel panel-info" style="margin-top:20px">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">在线音乐播放器</h3>
                    </div>

                    <div style="position:absolute;left: 520px;top:100px;z-index: 100">
                        <a class="btn btn-info btn-sm text-center" href="/index.php/Admin/Music/download/id/<?php echo ($data["id"]); ?>">下载</a>
                        <a class="btn btn-info btn-sm text-center" href="/index.php/Admin/Music/download/id/<?php echo ($data["id"]); ?>">好评</a>
                        <a class="btn btn-info btn-sm text-center" href="/index.php/Admin/Music/download/id/<?php echo ($data["id"]); ?>">差评</a>
                    </div>
                    <div class="panel-body row">
                            <textarea id="lrc_content" name="textfield" cols="70" rows="10" style="display:none;">
                                <?php echo ($data["lyric"]); ?>
                            </textarea>
                            <div class="jp-type-playlist">
                            <div class="music_box">
                                <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                                <div id="jp_container_1" class="jp-audio"style="border:none">
                                    <div class="jp-type-single" style="width:585px">
                                        <div class="jp-gui jp-interface">
                                            <ul class="jp-controls">
                                                <li><a href="javascript:;" class="jp-play" tabindex="1">播放</a></li>
                                                <li><a href="javascript:;" class="jp-pause" tabindex="1">暂停</a></li>
                                                <li><a href="javascript:;" class="jp-stop" tabindex="1">停止</a></li>
                                                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="静音">静音</a></li>
                                                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="音量"></a></li>
                                            </ul>
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar">
                                                    <div class="jp-play-bar"></div>
                                                </div>
                                            </div>
                                            <div class="jp-volume-bar">
                                                <div class="jp-volume-bar-value"></div>
                                            </div>
                                            <div class="jp-time-holder">
                                                <div class="jp-current-time"></div>
                                                <div class="jp-duration"></div>
                                                <ul class="jp-toggles">
                                                    <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="单曲循环">循环</a></li>
                                                    <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="取消循环">取消循环</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="jp-title">
                                            <ul>
                                                <li>当前播放：<?php echo ($data["ssong"]); ?></li>
                                            </ul>
                                        </div>
                                        <div class="jp-no-solution"> <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>. </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <ul id="lrc_list">
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>