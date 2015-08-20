<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/14
 * Time: 16:18
 */

/**
 * 用户信息的数组，不使用数据库保存，直接使用数组保存
 * @todo 使用数据库管理用户
 * 'username' => array(info)
 */
return array(
    'zhangyong' => array(
        'id' => 1,
        'username' => 'zhangyong',
        'password' => 'asdfghjkl',
        'c_time' => '2015-08-14 16:22:00',
        'status' => '1',
        // 可管理的app的id的列表， 使用*代表可以管理所有，否则列出各个id。示例：
        // array('*'); array(1,2,3,4); array(1,2,3,4, '<5', '>7')
        // 大于小于都是 OR 关系
        'apps'   => array(1,2, '>3')
    )
);