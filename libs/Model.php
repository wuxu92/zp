<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/30
 * Time: 15:42
 */

namespace libs;


/**
 * model的基类，各个模型需要实现静态方法tableName，因为数据查询方法使用
 * 的是后期静态绑定的静态方法 static::tableName()
 * Class Model
 * @package libs
 */
abstract class Model {

    /**
     * default construct method for model class
     * if array is empty, then the props will not be initialized
     * @param array $array
     */
    public function __construct($array = array()) {
        foreach ($array as $k => $v) {
            $this->$k = $v;
        }
    }

    // public $tableName;

    /**
     * 返回表名, 这个方法只是为了消除ide的错误检查，实际使用的是子类的静态方法
     * @return string
     */
    public static function tableName() {
        return '';
    }

    /**
     * 返回数据表的各列
     * @return array
     */
    abstract function columns();

    public function insert() {
        ZP::info("insert from model: " . get_class($this));

        $cols = $this->columns();
        $colStr = implode(',', $cols);

        $sql = 'insert into ' . static::tableName() . '(' . $colStr . ') values (';
        $bindArr = array();
        foreach ($cols as $col) {
            $place = ":$col";
            $sql .= "$place,";
            $bindArr[$place] = $this->$col;
        }
        $sql = rtrim($sql, ',');
        $sql .= ')';

        ZP::info('model insert sql:' . $sql, 'uc', false);

        $res = ZP::app()->db->createSql($sql, $bindArr)->execute();
        return $res;
    }

    /**
     * update database with this instance
     * @param array|string $where
     * @return int
     */
    public function update($where='1') {
        ZP::info("update from model");
        $sql = 'update ' . static::tableName() . ' set ';
        $cols = $this->columns();
        $bindArr = array();
        foreach ($cols as $col) {
            $sql .= "$col=:$col,";
            $bindArr[":$col"] = $this->$col;
        }
        $sql = rtrim($sql, ',');
        $sql .= self::whereSql($where);

        ZP::info("update sql:" . $sql);

        return ZP::app()->db->createSql($sql, $bindArr)->execute();
    }

    /**
     * 根据id查询记录，返回对应对象
     * @param $pk int id value
     * @return null|static
     */
    public static function findById($pk) {
        if ( !is_int($pk)) return null;

        $sql = 'select * from ' .  static::tableName() . ' where id=' . $pk;
        $row = ZP::app()->db->createSql($sql)->queryOne();

        if (empty($row)) return null;

        return new static($row);
    }

    /**
     * 获取一个id数组的所有记录
     * @param $ids array
     * @return mixed
     */
    public static function findByIdList($ids=array()) {
        $sql = 'select * from ' . static::tableName() . ' where id in (' . implode(',', $ids) . ')';

        return ZP::app()->db->createSql($sql)->queryAll();
    }

    /**
     * 根据id删除记录，确保id转换为了int型
     * @param $pk int id value
     * @return bool|int
     */
    public static function deleteById($pk) {
        if (!is_int($pk)) {
            return false;
        }

        $sql = 'delete from ' . static::tableName() . ' where id=' . $pk;

        return ZP::app()->db->createSql($sql)->execute();
    }

    /**
     * delete by this instance's id
     */
    public function delete() {
        if ( !isset($this->id)) return false;

        $sql = 'delete from ' . static::tableName() . ' where id=' . $this->id;
        return ZP::app()->db->createSql($sql)->execute();
    }

    /**
     * @param $where array
     * @return int
     */
    public static function deleteByArray($where = array()) {
        $sql = 'delete from ' . static::tableName() . ' where ';
        foreach ($where as $k => $v) {
            $sql .= "$k='$v',";
        }
        $sql = rtrim($sql, ',');
        return ZP::app()->db->createSql($sql)->execute();
    }

    public static function getByPage($page = 1, $size = 20, $where='1', $order='id') {
        $where = self::whereSql($where);
        $countSql = 'select count(*) as count from ' . static::tableName() . $where;
        $limit = ($page-1) * $size;
        $sql = 'select * from ' . static::tableName() . "$where order by  $order limit $limit, $size";

        $count = ZP::app()->db->createSql($countSql)->queryOne(\PDO::FETCH_NUM);
        $count = $count[0];

        $rows = ZP::app()->db->createSql($sql)->queryAll();

        return array('count'=>intval($count), 'page'=>$page, 'size'=>$size, 'data' => $rows);
    }


    public static function getAll() {
        $sql = 'select * from ' . static::tableName();

        return ZP::app()->db->createSql($sql)
            ->queryAll();
    }


    protected function columnsSql() {
        $cols = $this->columns();
        $colStr = implode(',', $cols);
        return "( $colStr )";
    }

    public static function whereSql($where='1') {
        if (is_string($where)) return ' where ' . $where;
        if (!is_array($where)) return ' ';
        $sql = ' where ';
        foreach ($where as $k=>$v) {
            $sql .= "$k='$v' and ";
        }

        return rtrim($sql, 'and ');
    }
}