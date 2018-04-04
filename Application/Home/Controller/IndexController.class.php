<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo __DIR__."这是我开发的第一个项目<br/>";
        $this ->display();
    }
}