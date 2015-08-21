<?php
/**
 * Created by PhpStorm.
 * User: wuxu#zplay.cn
 * Date: 2015/8/20
 * Time: 18:28
 */

namespace model;


use libs\Model;

class Sp extends Model{

    public $id;
    public $name;
    public $code;
    public $country;
    public $plmn;

    /**
     * 返回数据表的各列
     * @return array
     */
    public function columns()
    {
        return array(
            'id',
            'name',
            'code',
            'country',
            'plmn'
        );
    }

    public static function tableName() {
        return 'sp';
    }
}