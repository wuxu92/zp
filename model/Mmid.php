<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 15:58
 */

namespace model;


use libs\Model;
use libs\ZP;

class Mmid extends Model{

    public $channel_id;
    public $mmids = array();

    /**
     * 返回数据表的各列
     * @return array
     */
    function columns() {
        return array(
            'channel_id',
            'mmid'
        );
    }

    public static function tableName() {
        return 'channel_mmid';
    }

    public function __construct($channel_id) {
        $this->channel_id = $channel_id;
        $this->initMmids();
    }

    public function initMmids() {
        $sql = 'select * from ' . self::tableName() . ' where channel_id=' . "'{$this->channel_id}'";

        $rows = ZP::app()->db->createSql($sql)->queryAll();

        if ( !is_array($rows)) return null;

        $this->mmids = array();
        foreach ($rows as $row) {
            $this->mmids[] = $row['mmid'];
        }
    }

    public static function getChannelByMmid($mmid) {
        $sql = 'select * from ' . self::tableName() . ' where mmid=' . "'$mmid' limit 1";

        $row = ZP::app()->db->createSql($sql)->queryOne();
        if (empty($row)) return null;

        $channelId = $row['channel_id'];

        return Channel::instanceByChannelId($channelId);
    }
}