<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    //连接数据库，进行用户名及密码的登录验证
    public function login(){
        if(IS_POST){
            $post = I('post.');//接收全部表单中的数据
           //首先验证验证码是否正确
            $ver = new \Think\Verify();
            $res = $ver ->check($post['verify']);
            if($res){
                //验证码正确后，删除验证码，并进行数据库的验证
                unset($post['verify']);
                //声明模型，并做用户名和密码的登录验证
                $model = M('user');
               $data = $model -> where($post)-> find();
               if($data){
                   session('id',$data['id']);
                   session('role_id',$data['role_id']);
                   session('username',$data['username']);
                   $_SESSION['expiretime'] = time() +1800; // 刷新时间戳
                  // dump(session());die;
                   $this -> success('恭喜，登录成功！',U('Index/index'),2);
               }else{
                   $this -> error('您的用户名或密码错误！');
               }

            }else{
                $this -> error('您输入的验证码有误！');
            }

        }else{
            //展示登录模板
            $this ->display();
        }

    }
    //展示注册界面
    public function  register(){
        //二合一效果，如果不是数据提交则展示界面
        if(IS_POST){
            //要使用后台验证，需要使用tp自带的数据验证
            $post= I('post.');//接收表单数据
            //补全表单数据
            $post['is_use'] = 0;
            $post['role_id'] = 1;
            $post['addtime']= time();
           //dump($post);die;
            $model = D('user');
           $data= $model ->create($post);
            if(!$data){
                $this -> error($model ->getError());//展示自动验证的错误信息
            }
            $res = $model ->add();//前面 使用create方法的时候，这里添加可以不需要参数。
            if($res){
                $this ->success('恭喜您，注册成功！',U('login'),3);
            }else{
                $this ->success('注册失败！');
            }
        }else{
            //展示注册模板
            $this ->display();
        }

    }
    //在登录界面中生成验证码
    public function verify(){
        //配置验证码的样式
        $cfg = array(
            'fontSize'  =>  20,              // 验证码字体大小(px)
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    => 0,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'bg'        =>  array(255,255,255)  // 背景颜色
        );
        //实例化验证码对象
        $Verify = new \Think\Verify($cfg);
        //生成验证码
        $Verify->entry();
    }

}