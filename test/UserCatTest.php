<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/14
 * Time: 17:21
 */

namespace test;

use model\User;

class UserCatTest extends \PHPUnit_Framework_TestCase {


    public function testAdd() {
        $this->assertTrue(1 + 1 == 2);
    }

    public function testAppCondition() {
        $use = new User(array(
            'id' => 1,
            'username' => 'zhangyong',
            'password' => 'asdfghjkl',
            'c_time' => '2015-08-14 16:22:00',
            'status' => '1',
            'apps'   => array(1,2,3,4, '>10')
        ));

        $this->assertEquals('where id>10 OR id in (1,2,3,4)', $use->buildAppWhere());
    }
}
