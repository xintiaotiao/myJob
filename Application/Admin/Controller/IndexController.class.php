<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //展示后台首页
    public function index(){
        $this -> display();
    }
    public function introduce(){
        $this -> display();
    }
    //点击退出按钮，清空session并调整到登录页面
    public function logout(){
        $ses=session_destroy();//用php原生方法实现清空session
        $this -> success('退出成功！',U('Admin/Public/login'),1);//跳转到登录页面
    }
    //展示原来模板文件的bootstrap效果，需要实现各模板文件的方法
    public function basic_table(){
        $this -> display();
    }

    public function blank(){
        $this -> display();
    }

    public function buttons(){
        $this -> display();
    }

    public function calendar(){
        $this -> display();
    }

    public function chartjs(){
        $this -> display();
    }

    public function form_component(){
        $this -> display();
    }

    public function gallery(){
        $this -> display();
    }

    public function general(){
        $this -> display();
    }

    public function lock_screen(){
        $this -> display();
    }

    public function morris(){
        $this -> display();
    }

    public function panels(){
        $this -> display();
    }

    public function responsive_table(){
        $this -> display();
    }

    public function todo_list(){
        $this -> display();
    }


}