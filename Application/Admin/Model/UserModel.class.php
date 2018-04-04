<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
    protected $_validate = array(
        array('name','require','用户名不能为空！'),
        array('name','','用户名不能重复！',1,'unique'),
        array('email','require','邮箱地址不能为空！'),
        array('email','email','邮箱格式不正确！')
    );


}