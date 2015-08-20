<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 11:25
 */

namespace test;


class Test extends \PHPUnit_Framework_TestCase {

    public function testArray() {
        $arr = array('name' => 'wuxu');
        $this->assertEquals($arr[0], $arr['name']);
    }
}
