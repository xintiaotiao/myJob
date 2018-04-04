<?php
namespace Admin\Controller;
use Think\Controller;
class OpusController extends Controller {
    //展示其他作品，比如flash、ps技术等
    public function flash(){

        //展示模板
        $this ->display();
    }
    public function ps(){

        //展示模板
        $this ->display();
    }
}