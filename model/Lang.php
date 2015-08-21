<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 18:07
 */

namespace model;


use libs\Model;

class Lang extends Model{

    public $id;
    public $abbr;
    public $lang;
    /**
     * 返回数据表的各列
     * @return array
     */
    function columns()
    {
        return array(
            'id',
            'abbr',
            'lang'
        );
    }

    public static function tableName() {
        return 'language';
    }
}