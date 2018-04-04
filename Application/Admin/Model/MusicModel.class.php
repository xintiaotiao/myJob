<?php
namespace Admin\Model;
use Think\Model;
class MusicModel extends Model {
    //自定义一个模型方法来处理文件上传，需要传递2个参数
    public function addData($post,$file){
        //首先判断是否有文件要上传
        if($file['ssong']['error']==0 ||$file['spic']['error']==0){
            $cfg=array(
                'rootPath'      => WORKING_PATH . UPLOAD_PATH, //保存根路径
            );
            $upload= new \Think\Upload($cfg);//声明一个上传类的对象
            $upload->exts = array();// 设置附件上传类型
            $info=$upload ->upload($file);//调用上传方法，返回值是9个元素的一维关联数组
            //补全数据表中的文件上传字段
            //dump($info);die;
            if($file['ssong']['error']==0){
                $post['ssong']=$info['ssong']['name'];//歌曲名称
                $post['ssongpath']=UPLOAD_PATH . $info['ssong']['savepath'] .$info['ssong']['savename'];//歌曲背景图片路径
            }
            if($file['spic']['error']==0){
                $post['spic']=$info['spic']['name'];//歌曲背景图片名称
                $post['spicpath']=UPLOAD_PATH . $info['spic']['savepath'] .$info['spic']['savename'];//歌曲背景图片路径
            }


        }
        //继续补齐数据表的字段
        $post['au_id']=session('id');//上传者id
        $post['addtime']=time();//音乐上传的时间
        //dump($post);die;
        return $this -> add($post);
    }


}