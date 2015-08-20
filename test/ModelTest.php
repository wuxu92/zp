<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 11:13
 */

namespace test;


use libs\Model;

class ModelTest extends \PHPUnit_Framework_TestCase {

    public function testWhereSql() {
        $where = Model::whereSql('id > 10 and status =1');
        $this->assertEquals('where id > 10 and status =1', $where);
    }

    public function testWhereArr() {
        $where = Model::whereSql(array('id'=> '1', '1' => '1'));

        $this->assertEquals(" where id='1' and 1='1'", $where);
    }
}
