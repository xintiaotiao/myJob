<?php
namespace Admin\Model;
use Think\Model;
class EmailModel extends Model {
    //自定义一个模型方法来处理文件上传，需要传递2个参数
    public function addData($post,$file){
        //首先判断是否有文件要上传
        if(!$file['error']){
            $cfg=array(
                'rootPath'      => WORKING_PATH . UPLOAD_PATH, //保存根路径
            );
            $upload= new \Think\Upload($cfg);//声明一个上传类的对象
            $info=$upload ->uploadOne($file);//调用上传方法，返回值是9个元素的一维关联数组
            //补全数据表中的文件上传字段
            $post['hasfile']=1;
            $post['isread']=0;
            $post['filename']=$info['name'];
            $post['filepath']=UPLOAD_PATH . $info['savepath'] . $info['savename'];
        }
        //继续补齐数据表的字段
        $post['addtime']=time();
        $post['from_id']=session('id');//发件人的id就是登录时候记录的session   id
        //dump($post);die;
        return $this -> add($post);
    }


}