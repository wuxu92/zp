<?php
/**
 * Created by PhpStorm.
 * User: wuxu#zplay.cn
 * Date: 2015/8/20
 * Time: 18:07
 */

namespace cat;


use libs\Category;
use model\Lang;

/**
 * 语言管理的Category
 * Class LangCat
 * @package cat
 */
class LangCat extends Category{

    public function listAction() {

        $langs = Lang::getAll();
        $this->retObj->setData(array('count'=>count($langs), 'data'=>$langs))
            ->json();
    }
}