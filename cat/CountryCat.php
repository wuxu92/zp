<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/20
 * Time: 17:50
 */

namespace cat;


use libs\Category;
use model\Country;

class CountryCat extends Category{

    public function listAction() {

        $cs = Country::getAll();
        $this->retObj->setData(array(
            'count' => count($cs),
            'data'  => $cs
        ))
            ->json();
    }
}