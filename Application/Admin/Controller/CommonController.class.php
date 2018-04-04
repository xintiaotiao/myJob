<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
   //自定义第三方控制器，在构造方法中添加代码，实现防翻墙操作
    public function __construct()
    {
        //在父类中构造
        parent::__construct();

        //设置session过期时间
//         if(isset($_SESSION['expiretime'])) {
//             if($_SESSION['expiretime'] < time()) {
//                 session_destroy();//清空所有session
//                 // header('Location: logout.php?TIMEOUT'); // 登出
//                 $url=U('Public/login');
//                 echo "<script>top.location.href='$url';</script>";die;
//             }else{
// //                $_SESSION['expiretime'] = time() + 120; // 刷新时间戳 ,加上之后不会自动退出
//             }
//         }

        //如果session不存在，证明没有登录，跳转到登录界面。
        $id = session('id');
        if(empty($id)){
           // $this ->error('您还没有登录！',U('Public/login'),3);die;
            $url=U('Public/login');
            echo "<script>top.location.href='$url';</script>";die;
        }


        //用C方法读取配置文件，做用户的RBAC权限管理
        $role_id= session('role_id');
        $rbac_auther = C('RBAC_AUTHER');
        //获取用户输入的控制器及方法名称来判断用户是否有权限
        $rbac_array= $rbac_auther[$role_id] ;
        $str = CONTROLLER_NAME . '/' .ACTION_NAME;
        $bool =in_array($str,$rbac_array);
        $url = U('Index/index');
        //dump($bool);die;
        if($bool){
            $this ->error('您没有访问的权限，请联系管理员！');die;
           // echo "<script>top.location.href = '$url';</script>";die;
        }
    }
}