<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/24
 * Time: 15:58
 */

namespace cat;


use libs\Category;

class IndexCat extends Category{

    public function indexAction() {
        echo json_encode(array('title' => "welcome!"));
    }
}