<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends CommonController {

    public function sendMail(){

        //将邮件发送和展示代码合一
        if(IS_POST){
            //接收表单传递的数据
            $post=I('post.');
            //调用自定义模型类实现数据入库操作
            $model = D('Email');
            $res=$model ->addData($post,$_FILES['file']);
            if($res){
                $this -> success("发送邮件成功！",U('sendBox'),3);
            }else{
                $this -> error("发送邮件失败！");
            }

        }else{
            //关联用户表，将所有用户在列表中显示
            $sql = 'select id,username from my_user where id != ' .session('id');
            $model = M();
            $data= $model -> query($sql);
            //分配查询的数据到模板中
            $this -> assign('data',$data);
            //展示发邮件的页面
            $this ->display();
        }

    }
    //实现发件箱列表效果
    public function sendBox(){
        //编写sql语句，实现发件箱的展示效果
        $sql1 = 'select count(*) as count from my_email,my_user  where my_email.to_id = my_user.id and my_email.from_id ='.session('id');
        //select返回的是一个二维数组，需要把里面的值取出来赋值给总个数，这个跟tp的连贯操作步骤是不同的
        $count = M() -> query($sql1)[0]['count'];
        $Page= new \Think\Page($count,6);
        $show = $Page->show();// 分页显示输出
       // dump($show);die;
        $this -> assign('show',$show);
        $sql2 = 'select my_email.*,my_user.username,my_user.truename from my_email,my_user  where my_email.to_id = my_user.id and my_email.from_id = '.session('id') . ' order by my_email.id desc limit '.$Page->firstRow.','.$Page->listRows;
        $data = M() -> query($sql2);
        //$data = M()->field('my_email.*,my_user.username,my_user.truename') ->table('my_email,my_user')->where('my_email.to_id = my_user.id and my_email.from_id ='.session('id'))->order('email.id desc')->select();
        //dump($data);die;
        $this -> assign('data',$data);
        //展示发件箱模板，存在的问题是不能直接在iframe中显示，这就要用到js的功能了
        $this -> display();
    }

    //接收邮件列表展示
    public function recBox(){
        //编写sql语句，实现发件箱的展示效果
        $sql1 = 'select count(*) as count from my_email,my_user  where my_email.from_id = my_user.id and my_email.to_id ='.session('id');
        //select返回的是一个二维数组，需要把里面的值取出来赋值给总个数，这个跟tp的连贯操作步骤是不同的
        $count = M() -> query($sql1)[0]['count'];
        $Page= new \Think\Page($count,6);
        $show = $Page->show();// 分页显示输出
        // dump($show);die;
        $this -> assign('show',$show);
        $sql2 = 'select my_email.*,my_user.username,my_user.truename from my_email,my_user  where my_email.from_id = my_user.id and my_email.to_id = '.session('id') . ' order by my_email.id desc limit '.$Page->firstRow.','.$Page->listRows;
        $data = M() -> query($sql2);
        //$data = M()->field('my_email.*,my_user.username,my_user.truename') ->table('my_email,my_user')->where('my_email.to_id = my_user.id and my_email.from_id ='.session('id'))->order('email.id desc')->select();
        //dump($data);die;
        $this -> assign('data',$data);
        //展示发件箱模板，存在的问题是不能直接在iframe中显示，这就要用到js的功能了
        $this -> display();
    }

    //点击删除按钮实现单个删除邮件
    public function del(){
        //接收传递的id
        $id = I('get.id');
        //dump($id);die;
        $model = M('email');
        //删除的时候，如果有附件，会把附件一起删除
        $fdel=$model->find($id);
        $path = WORKING_PATH. $fdel['filepath'];
        if(file_exists($path))
        {
            //检查文件是否存在
            unlink($path);//一起删除文件
        }
        $data = $model -> delete($id);
        if($data){
            $this -> success('删除成功！',U('sendBox'),3);
        }else{
            $this -> success('删除失败！');
        }
    }

    //实现附件下载功能代码
    public function download(){
        //接收传递过来的id
        $id = I('get.id');
        //首先连接数据库，查询出要下载的文件的盘符路径
        $model = M('email');
        $data= $model -> find($id);
        //以下为通用的文件下载代码
        $file=WORKING_PATH . $data['filepath'];
        header("Content-type:application/octet-stream");
        // $filename = basename($file);
        //自定义下载文件的文件名称
        $filename =$data['filename'];
        header("Content-Disposition:attachment;filename = ".$filename);
        header("Accept-ranges:bytes");
        header("Accept-length:".filesize($file));
        readfile($file);
    }

    //在layer中展示查看的邮件内容
    public function showContent(){
        //接收传递的id
        $id = I('get.id');
        //使用连贯写法
        $model = M('email');
       $data= $model ->find($id);
        //直接输出结果，并要进行解码
        echo htmlspecialchars_decode($data['content']);

    }

    //在关闭layer弹窗后自动修改状态为已读
    public function sendIsread(){
        //接收传递的id
        $id = I('get.id');
        //使用连贯写法
        $model = M('email');
        $model->id=$id;
        $model->isread=1;
        $data= $model ->save();
        if($data){
           $this ->redirect('Email/sendBox');
        }
    }

    public function recIsread(){
        //接收传递的id
        $id = I('get.id');
        //使用连贯写法
        $model = M('email');
        $model->id=$id;
        $model->isread=1;
        $data= $model ->save();
        if($data){
           // $this ->redirect('Email/recBox');//这里会再次查询数据库，可以用下面的替代方法
            //下面利用js代码实现跳转，好处就是可以选择跳转的窗口，如果出现画中画，可以用top.location.href='url'
            $url=U('Email/recBox');
            echo "<script>window.location.href='$url';</script>";
        }
    }

    //ajax代码获取未读邮件的数量，并列出前5个未读邮件
    public function getMessage(){
        //编写sql语句，要连表查询，因为不但要获取个数，还要展示前面5个未读邮件的内容
        $sql = 'select  my_user.username as sender,my_email.title,my_email.isread,my_email.addtime from my_email,my_user where my_email.from_id = my_user.id and my_email.to_id = '.session('id').' and my_email.isread !=1  order by my_email.addtime desc limit 5';
        $model = M();
        $data =  $model ->query($sql);
//        用连贯写法，总是提示表不存在，在配置上肯定是有问题
//        1146:Table 'my_job.my_email,my_user' doesn't exist [ SQL语句 ] : SHOW COLUMNS FROM `my_email,my_user`
//        $data = $model->field('my_user.username as sender,my_email.title,my_email.isread,my_email.addtime')
//            ->table('my_email,my_user')
//            ->where(' my_email.from_id = my_user.id and my_email.to_id ='.session('id').' 1 and my_email.isread !=1')
//            ->order('my_email.addtime desc')
//            ->limit('5')
//            ->select();

         echo json_encode($data);
        //dump( json_encode($data));
    }
    //获取记录数
    public function getEmail(){
        $sql = 'select count(*)as count from my_email,my_user where my_email.from_id = my_user.id and my_email.to_id = '.session('id').' and my_email.isread !=1';
        $model = M();
        $count = $model ->query($sql);
        //记得原生sql查询返回的结果是一个二维数组
        echo $count[0]['count'];
    }

    //利用phpExcel外部工具类，实现已有数据导出到excel文件中
    public function getExcel(){

        //只需要获取数据库查询的2维数组的值即可
        $data=array();
        exportExcel(array('导出邮件'),$data,'邮箱信息','',true);
    }


}