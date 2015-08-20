<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 14:27
 */

namespace cat;


use libs\Model;

class Channel extends Model {

    public $id;
    public $channel_id;
    public $channel_name;
    public $channel_company;
    public $channel_type;
    public $country;
    public $manger;
    public $password;
    public $dbqdfc;
    public $dbqdsjffbl;
    public $ggqdfc;
    public $ggqdsjffbl;

    /**
     * 返回数据表的各列
     * @return array
     */
    function columns()
    {
        return array(
            'id',
            'channel_id',
            'channel_name',
            'channel_company',
            'channel_type',
            'country',
            'manger',
            'password',
            'dbqdfc',
            'dbqdsjffbl',
            'ggqdfc',
            'ggqdsjffbl'
        );
    }

    
}