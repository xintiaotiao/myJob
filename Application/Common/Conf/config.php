<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'my_job',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'my_',    // 数据库表前缀

    //显示跟踪信息，以方便调试
    SHOW_PAGE_TRACE => TRUE,

    //配置默认的控制器及方法名
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Public', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称

    //在配置文件中设定RBAC权限管理
    'RBAC_AUTHER'           =>array(
        //管理员拥有首页的权限，邮箱的发送及查收功能
        0 =>array(),
        //普通用户有首页的权限，及邮箱的发送和收件箱功能，没有查看发件箱的权限
        1 =>array('Email/sendBox','Email/del','Music/download','Music/mdel','Music/medit')
    )
);