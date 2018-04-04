<?php
namespace Admin\Controller;
use Think\Controller;
class StoryController extends Controller {

    //小说首页
    public function index(){
        //查询数据库，把需要的字段读出来并显示在页面
        $model = M('story');
        $data = $model ->order('shot desc,saddtime desc') ->select();
        //dump($data);die;
        //分配数据到模板
        $this ->assign('data',$data);
        //展示模板
        $this ->display();
    }

    //显示小说章节
    public function indexItem(){
        //接收id
        $id = I('get.id');
        //每当点击一次阅读后，点击量会自动增加
        $model = M('story');
        $data = $model->find($id);
        $hot = $data['shot'];
        //点击量自增加,AR模式的写法要注意细节
        $model ->id=$id;
        $model->shot= $hot+1;
        M('story')->save();
        //分配story表的数据
        $data1 =M('story') ->find($id);
        $this ->assign('data1',$data1);
        //通过接收的id，写章节表的sql语句，查询出当前id小说的所有章节信息
        $sql ='select  my_stoitem.* from my_stoitem where my_stoitem.str_id = '. $id .' order by my_stoitem.sort asc, my_stoitem.addtime asc';
        $data2 = M() ->query($sql);
        $this ->assign('data2',$data2);
        $this ->display();
    }

    //显示小说章节内容
    public function indexDetail(){
        //接收id
        $id = I('get.id');
        $model = M('stoitem');
        $data = $model ->find($id);
        $this ->assign('data',$data);
        $this ->display();
    }
    //处理点击返回目录代码
    public function back(){
        //获取传递的id
        $bid = I('get.sid');
        //通过获取的id查出id所属的小说id
        $res = M('stoitem') ->find($bid);
        //dump($res);die;
        $id = $res['str_id'];
        //dump($id);die;
        //获取小说所属id后，下面的代码就和展示itemdetail一样了，可以直接复制
        //分配story表的数据
        $data1 =M('story') ->find($id);
        $this ->assign('data1',$data1);
        //通过接收的id，写章节表的sql语句，查询出当前id小说的所有章节信息
        $sql ='select  my_stoitem.* from my_stoitem where my_stoitem.str_id = '. $id .' order by my_stoitem.sort asc , my_stoitem.addtime asc';
        $data2 = M() ->query($sql);
       // $data2= M('stoitem')  ->where('str_id = '.$id) ->order('sort asc,addtime asc') ->select();
        $this ->assign('data2',$data2);
        $this ->display('indexItem');

    }
    //处理点击上一章代码
    public function pre(){
        //接收id
        $pid = I('get.pid');
        //获取pid后，如果不是第一章，则sort加1
        $res = M('stoitem') ->find($pid);
        $sid = $res['str_id'];//获取小说id，作为条件
        $model =M('stoitem');
        $min = $model -> where('str_id = '.$sid) ->min('sort');//获取章节的最小sort值
        //dump($min);die;
        $data =$model ->find($pid);
        $sort =$data['sort'];
        if($sort  >$min){
            $sort =$sort-1;
        }
        $data =$model ->where('str_id ='.$sid .' and  sort ='.$sort) ->find();
        $id =$data['id'];//获取到新的章节id
        $data = $model ->find($id);
        $this ->assign('data',$data);
        $this ->display('indexDetail');
    }

    //处理点击下一章代码
    public function next(){
        //接收id
        $nid = I('get.nid');
        //获取pid后，如果不是第一章，则sort加1
        $res = M('stoitem') ->find($nid);
        $sid = $res['str_id'];//获取小说id，作为条件
        $model =M('stoitem');
        $max = $model -> where('str_id = '.$sid) ->max('sort');//获取章节的最大sort值
        //dump($min);die;
        $data =$model ->find($nid);
        $sort =$data['sort'];
        if($sort < $max){//当当前章节就是最后一章的时候，不会加1
            $sort =$sort+1;
        }
        $data =$model ->where('str_id ='.$sid .' and  sort ='.$sort) ->find();
        $id =$data['id'];//获取到新的章节id
        $data = $model ->find($id);
        $this ->assign('data',$data);
        $this ->display('indexDetail');
    }

    //添加小说
    public function add(){
        //判断，如果不是表单提交则展示数据，是表单提交则出来数据
        if(IS_POST){
            //接收表单数据
            $post = I('post.');
            //补全小说表中的字段
            $post['saddtime']= time();
            $post['shot'] = 1;//初始化点击量为1
            //dump($post);die;
            //实例化模型，并实现数据入库
            $model = M('story');
            $data = $model ->add($post);//这里如有必要，可以采用自动验证
            if($data){
                $this ->success("添加小说成功！",U('index'),3);
            }else{
                $this ->error("添加小说失败！");
            }
        }else{
            //展示模板
            $this ->display();
        }
    }

    //管理小说
    public function manager(){
        $model = M('story');
        $data = $model ->order('shot desc') ->select();
        $this ->assign('data',$data);
        //展示模板
        $this ->display();
    }
    //编辑小说
    public function edit(){
        if(IS_POST){
            //接收表单数据
            $post = I('post.');
            //编辑后修改时间
            $post['saddtime']=time();
            //dump($post);die;
            $model= M('story');
            $data = $model ->save($post);
            if($data){
                $this ->success('修改成功！',U('Story/manager'));
            }else{
                $this ->error('修改失败！');
            }
        }else{
            $id =I('get.id');
            $data =M('story')->find($id);
            $this ->assign('data',$data);
            //展示模板
            $this ->display();
        }
    }
    //删除小说
    public function del(){
        //接收id
        $id = I('get.id');
        $count= M('stoitem') ->where('str_id=' .$id ) ->count();
        if($count >0){
          //这里是判断小说是否还有章节，否则不能删除
            $this ->error('请先删除小说的所有章节后再删除小说！');die;
        }else{
            $data =M('story')->delete($id);
            if($data){
                $this ->success('删除成功！',U('Story/manager'));
            }else{
                $this ->error('删除失败！');
            }
        }

    }
    //编辑小说章节
    public function editItem(){
        if(IS_POST){
            //接收表单数据
            $post = I('post.');
            $id =$post['id'];
            $res=M('stoitem')->find($id);
            $pid =$res['str_id'];
            //编辑后修改时间
            $post['addtime']=time();
           // dump($post);die;
            $model= M('stoitem');
            $data = $model ->save($post);
            if($data){
                $this ->success('修改成功！',U('Story/managerItem?id= '.$pid));//U方法传递参数
            }else{
                $this ->error('修改失败！');
            }
        }else{
            //需要查询出所有的小说并显示出来
            $data= M('story')->field('id,sname') ->select();
            $this ->assign('data',$data);

            $id =I('get.id');
            $data1 =M('stoitem')->find($id);
            $this ->assign('data1',$data1);
            //展示模板
            $this ->display();
        }
    }
    //小说章节管理
    public function managerItem(){
        //接收id
        $id= I('get.id');
        //通过id显示小说的数据和小说关连的章节数据
        $data1 =M('story') ->find($id);
        $this ->assign('data1',$data1);
        //下面显示小说对应的章节
        //具有分页效果
        $model = M('stoitem');
        $count = $model ->where('str_id = '. $id) ->count();
        $page = new \Think\Page($count,20);
        $show = $page->show();
        $this ->assign('show',$show);
        $data2=$model ->where('str_id = '. $id)->order('sort asc') ->limit($page->firstRow.','.$page->listRows) ->select();
       // dump($data2);die;
        $this ->assign('data2',$data2);
        $this ->display();

    }
    //删除小说章节
    public function delItem(){
        //接收id
        $id = I('get.id');
        $res=M('stoitem')->find($id);
        $pid =$res['str_id'];
        //dump($id);die;
        $data =M('stoitem')->delete($id);
        if($data){
            $this ->success('删除成功！',U('Story/managerItem?id='.$pid));
        }else{
            $this ->error('删除失败！');
        }
    }

    //添加小说章节
    public function addItem(){
        if(IS_POST){
            //如果是表单提交则处理数据，由于要对字段进行限定，所以采用数据创建方式提交
            $post = I('post.');
            //补全字段
            $post['addtime'] = time();
            $model =D('stoitem');//实例化自定义模型
            $data= $model ->create($post);
            if(!$data){
                $this -> error($model ->getError());die;//展示自动验证的错误信息
            }
            $res = $model ->add();//前面 使用create方法的时候，这里添加可以不需要参数。
            if($res){
                $this ->success('添加章节成功！');//不传递参数表示返回上一页
            }else{
                $this ->success('添加章节失败失败！');
            }
        }else{
            //需要查询出所有的小说并显示出来
             $data= M('story')->field('id,sname') ->select();
            $this ->assign('data',$data);
            //展示模板
            $this ->display();
        }

    }

}