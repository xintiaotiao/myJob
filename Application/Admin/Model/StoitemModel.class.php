<?php
namespace Admin\Model;
use Think\Model;
class StoitemModel extends Model {
    protected $_validate = array(
        array('sort','require','小说章节序号不能为空！'),
       // array('sort','','小说章节序号不能重复！',1,'unique'),
        array('sort','number','小说章节序号必须是数字！')
    );

}