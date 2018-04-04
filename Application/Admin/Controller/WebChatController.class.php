<?php
namespace Admin\Controller;
use Think\Controller;
class WebChatController extends Controller {
  public function index(){
  	//当用户点击发送消息后，实现数据入库操作
  	if(IS_POST){
  		//接收表单数据
  		$post = I('post.');
  		//补全my_chat表中的字段
  		$post['from_id'] = session('id');
  		$post['stas'] = 1;
  		$post['addtime'] =time();
  		//实例化模型并写入数据
  		$model = M('chat');
  		$data =$model ->add($post);
  		if(!$data){
  			echo "发送消息失败！";
  		}
  		//dump($post);
  		
  	}else{
  		//从数据库中读取数据，并分配到视图中
	  	$model = M('user');//这里先把下拉列表中的用户显示
	  	$data = $model ->field('id,username') ->where('id != '.session('id')) ->select();
	  	$this ->assign('data',$data);
	  	//dump($data);

	  	//展示模板,只在第一次打开聊天页面时跳转，其他全用ajax实现无刷新跳转
	     $this -> display();
  	}    
  }
  //ajax实现获取聊天内容
  public function chatContent(){
    //echo "1";
    //获取ajax传递的参数
    $id =I('post.id');
    //$id =2;
    if($id){
      //这个sql语句很复杂，用到了2表连表查询，同时用到了union组合，在业务逻辑上实现聊天的问答功能
      //获取最大的id值,当记录数达到20条的时候调用
      $max1 =M('chat') ->where('from_id = '.session('id').' and to_id = '.$id) ->count();
      $max2 =M('chat') ->where('to_id = '.session('id').' and from_id = '.$id) ->count();
      $max = $max1+$max2;
      if($max>20){
        $lim =$max-20;
      }else{
        $lim = 0;
      }
      $sql ="select my_chat.*,my_user.username as username from my_chat,my_user where my_chat.to_id = ".$id." and my_chat.from_id = ".session('id')." and my_chat.from_id=my_user.id union select my_chat.*,my_user.username as username from my_chat,my_user where my_chat.to_id = ".session('id')." and my_chat.from_id = ".$id." and my_chat.from_id=my_user.id order by addtime asc limit ".$lim.",20";
      $model =M();
      $data =$model ->query($sql);
      $str =json_encode($data);
      echo $str;
      // echo "<pre>";
      // dump($data);
      // echo "<pre/>";
      }else{
            echo "请选择聊天对象，开始沟通你我他！<br/>".date('Y-m-d H:i:s',time()).'<br/>';
      }
    
  }
  //ajax获取新消息信息
  public function getCount(){
    //接收参数，当前的id不查询
    //$id =I('post.to_id');
    $sql = 'select my_chat.*,my_user.username as username from my_chat,my_user where my_chat.to_id = '.session('id').' and my_chat.from_id =my_user.id and stas =1 group by my_chat.from_id order by my_chat.addtime desc ';
    //$data =M('chat') ->group('from_id') ->where('to_id = '.session('id'). ' and stas =1') ->select();
    $data =M()->query($sql);
    $str =json_encode($data);
    echo $str;
    //dump($data);
  }
  //ajax设置消息状态为已读
  public function setStatus(){
    $id = I('post.to_id');
    //1发给2   和2发给你的消息  状态要全部设置为2   所以需要2个sql语句
    $sql1 = 'update my_chat set my_chat.stas = 2 where my_chat.from_id = '.$id.' and my_chat.to_id = '.session('id');
    $sql2 = 'update my_chat set my_chat.stas = 2 where my_chat.to_id = '.$id.' and my_chat.from_id = '.session('id');
    $model = M();
    M()->query($sql1);
    M()->query($sql2);
  }
  // //显示聊天页面信息,开始使用的iframe，采用ajax后废弃采用div的overflow实现
  // public function webChat(){
  // 	//展示模板
  // 	$this -> display();
  // }

}