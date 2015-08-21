<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/20
 * Time: 17:46
 */

namespace model;


use libs\Model;
use libs\ZP;

class Country extends Model{

    public $id;
    public $name;
    public $code;
    public $abbr;
    public $money;
    public $lang_abbr;
    public $lang_name;

    /**
     * 返回数据表的各列
     * @return array
     */
    function columns()
    {
        return array(
            'id',
            'name',
            'code',
            'abbr',
            'money',
            'lang_abbr',
            'lang_name'
        );
    }

    public static function tableName() {
        return 'country';
    }


}