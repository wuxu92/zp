<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/31
 * Time: 16:31
 */

namespace model;


use libs\Model;
use libs\ZP;

class App extends Model {

    public $id;
    public $product_id;
    public $product_name;
    public $version;
    public $cp; // typo, should be sp
    public $country;
    public $platform;
    public $product_type;
    public $network_type;
    public $app_encode;
    public $status=1;

    public static function tableName() {
        return 'apps';
    }

    public function columns() {
        return array(
            'id',
            'product_id',
            'product_name',
            'version',
            'cp',
            'country',
            'platform',
            'product_type',
            'network_type',
            'app_encode',
            'status',
        );
    }

    /**
     * @param array $array
     */
    public function __construct($array = array()) {
        parent::__construct($array);
        //foreach ($array as $k => $v) {
        //    $this->$k = $v;
        //}
    }

    public static function getAll() {
        $sql = "select * from " . self::tableName() . ' limit 10';
        $rows = ZP::app()->db->createSql($sql)->queryAll();
        $apps = array();
        foreach ($rows as $row) {
            $apps[] = new App($row);
        }

        return $apps;
    }

    /**
     * dirty implementation
     * 并不好的实现方式，应该直接分开使用
     * @return int
     */
    public function save() {
        if ($this->id !== null) return $this->update(array('id' => $this->id));
        return $this->insert();
    }

}