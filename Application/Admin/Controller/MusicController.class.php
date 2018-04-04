<?php
namespace Admin\Controller;
use Think\Controller;
class MusicController extends CommonController {
  //展示音乐首页
    public function index(){
        //首先判断是否是用户在index页面发送搜索请求，如果是则要重新编写sql语句，否则就原样展示模板
        if(I('get.con1')){
                $con1 = I('get.con1');
                $model =M('music');
                $post1['ssong']=array('like','%'.$con1.'%');
                $post1['ison']=1;
                $data3 = $model ->where($post1) ->order(' hot desc, my_music.addtime desc') ->limit('15') ->select();
                //dump($content);die;
                $data3['con1']=$con1;
                $this -> assign('data3',$data3);
        }else{
            //全部音乐展示sql语句,由于数据会比较多，需要加入分页功能
            //求出总记录数
            $count = M('music') ->where('ison =1') ->count();
            //dump($count);die;
            $page = new \Think\Page($count,9);
            $show =  $page ->show();
            $sql3 = 'select my_music.*,my_user.username as uname from my_music,my_user where my_music.au_id = my_user.id and ison =1 order by hot desc, my_music.addtime desc limit '. $page->firstRow .','.$page->listRows;
            $data3 = M()->query($sql3);
            //dump($data3);die;
            $this -> assign('data3',$data3);
            $this ->assign('show',$show);
        }



        //分配数据到index模板中，由于有4个模块，所以要有4个sql语句
        //前10最热音乐sql语句
        $sql1 = 'select my_music.*,my_user.username as uname from my_music,my_user where my_music.au_id = my_user.id and ison =1 order by my_music.hot desc limit 10';
        $data1 = M()->query($sql1);
        //dump($data);die;
        $this -> assign('data1',$data1);

        //前10最新音乐sql语句
        $sql2 = 'select my_music.*,my_user.username as uname from my_music,my_user where my_music.au_id = my_user.id and ison =1 order by my_music.addtime desc limit 10';
        $data2 = M()->query($sql2);
        //dump($data2);die;
        $this -> assign('data2',$data2);

        //全部自定义音乐展示sql语句,由于数据会比较多，需要加入分页功能
        //求出总记录数
        $count4 = M('music') ->where('ison =1 and myself=2') ->count();
        //dump($count);die;
        $page4 = new \Think\Page($count4,3);
        $show4 =  $page4 ->show();
        $sql4 = 'select my_music.*,my_user.username as uname from my_music,my_user where (my_music.au_id = my_user.id and ison =1 and myself=2) order by hot desc, my_music.addtime desc limit '. $page4->firstRow .','.$page4->listRows;
        $data4 = M()->query($sql4);
        //dump($data3);die;
        $this -> assign('data4',$data4);
        $this ->assign('show4',$show4);
        //展示音乐
        $this -> display();
    }

    //添加音乐
    public function add(){
        //判断，如果是form表单提交，则处理数据，否则则展示添加页面
        if(IS_POST){
            //dump($_FILES);
            $post = I('post.');//接收post表单数据
            $model = D('Music'); //声明自定义模型类
            $data = $model -> addData($post,$_FILES);
           // dump($data);die;
            if($data){
                $this -> success('添加音乐成功！',U('index'),3);
            }else{
                $this -> error('添加音乐失败！');
            }
        }else{
            //展示添加界面
            $this -> display();
        }
    }

    //管理音乐
    public function edit(){
        //实现音乐管理的功能，主要先编辑sql语句，然后查询数据分配到模板即可
        //要使用2次查询了，获取每个歌曲的好评量，及查看评论，需要另外再写sql语句，无法整合到一个sql语句中
        //引入分页功能，先查询总记录数
        $count = M('music') ->count();
        $page = new \Think\Page($count,10);
        $show = $page ->show();
        $sql = 'select DISTINCT my_music.*,my_user.username from my_music left join my_user on my_music.au_id=my_user.id   order by my_music.hot asc,my_music.addtime asc limit '.$page->firstRow.','.$page->listRows;
        $data = M()->query($sql);
        $this ->assign('data',$data);//分配查询的值
        $this ->assign('show',$show);//分配分页样式
        //展示添加界面
        $this -> display();
    }
    //播放音乐
    public function playMusic(){
        //接收id，到数据库查找数据，并分配数据到play模板中，难点是play模板的音乐播放器调用及歌词同步问题
        $id = I('get.id');
        $model = M('music');
        //展示用户点击的音乐信息
        $data = $model ->find($id);
        $this ->assign('data',$data);//分配数据
        //增加了评论功能，需要新增评论展示数据

        //以下用到了三表连表查询，去重复的distinct必须放在最前面，否则会出现语法错误
        $sql = 'select DISTINCT my_mcomment.*,my_user.username from my_mcomment inner join my_user on my_mcomment.user_id = my_user.id inner join my_music on my_mcomment.song_id = '.$id.' order by my_mcomment.addtime desc limit 50;';
        $cdata= M()->query($sql);
        $this -> assign('cdata',$cdata);

        $this ->display();//展示模板
        //用户点击后实现点击量自动增加
        $num=$data['hot'];
        $model->id =$id;
        $model->hot=$num+1;;
        $model->save();
    }

    //下载音乐
    public function download(){
        //接收id
        $id = I('get.id');
        $model = M('music');
        $data = $model->find($id);
        //用户点击后实现点击量自动增加
        $num=$data['hot'];
        $model->id =$id;
        $model->hot=$num+1;;
        $model->save();
        //下载代码
        $file=WORKING_PATH . $data['ssongpath'];
        header("Content-type:application/octet-stream");
       // $filename = basename($file);
        //自定义下载文件的文件名称
        $filename =$data['ssong'];
        header("Content-Disposition:attachment;filename = ".$filename);
        header("Accept-ranges:bytes");
        header("Accept-length:".filesize($file));
        readfile($file);
    }
    //z处理音乐评论代码
    public function comment(){
        //接收ajax传递的数据
        $post = I('post.');
        //dump($post);die;
        //补全字段
        $post['user_id']=session('id');
        $post['addtime']=time();
        //实例化模型
        $model =M('mcomment');
        $data =$model ->add($post);//直接添加数据，返回值用查询数据。
        if($data){
            echo "评论成功！";
        }
    }
    //获取音乐的差评次数代码
    public function cBad(){
        //接收id
        $id = I('get.id');
        //dump($id);die;
        $model = M('mcomment');
        $data1 = $model ->where('gab =2 and my_mcomment.song_id = '.$id) ->count();
        $data2 = $model ->where('my_mcomment.song_id = '.$id) ->count();
        echo "总次数：".$data2 ."   差评次数：".$data1;
    }
    //编辑音乐
    public function medit(){
        if(IS_POST){
            //接收表单数据
            $post = I('post.');
            //编辑后修改时间
            $post['addtime']=time();
            //dump($post);die;
            $model= M('music');
            $data = $model ->save($post);
            if($data){
                $this ->success('修改成功！',U('Music/edit'));
            }else{
                $this ->error('修改失败！');
            }
        }
        else{
            //判断不是表单提交，则展示数据
            $id = I('get.id');
            //dump($id);die;
            $model = M('music');
            $data = $model ->find($id);
            $this ->assign('data',$data);
            $this ->display();
        }
    }
    //单个删除音乐
    public function mdel(){
        //接收id
        $id = I('get.id');
        //dump($id);die;
        $model = M('music');
        //删除的时候，如果有附件，会把附件一起删除
        $fdel=$model->find($id);
        $path = WORKING_PATH. $fdel['ssongpath'];
        if(file_exists($path))
        {
            //检查文件是否存在
            unlink($path);//一起删除文件
        }
       $data = $model ->delete($id);
        if($data){
            $this ->success('删除成功！',U('Music/edit'));
        }else{
            $this ->error('删除失败！');
        }
    }
}