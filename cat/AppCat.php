<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/8/20
 * Time: 15:12
 */

namespace cat;

use libs\Category;
use libs\Exception\ErrorCode;
use libs\Helper\RequestHelper;
use libs\ZP;
use model\App;

class AppCat extends Category {

    /**
     * 列出所有绑定的应用
     * 添加分页
     * @param page int 分页数，从1开始
     * @param size int 分页大小，默认20
     * @method GET
     */
    public function listAction() {

        $page = $this->getParam('page', 1);
        $size = $this->getParam('size', 20);
        $apps = App::getByPage($page, $size);
        $this->retObj->setData($apps)->json();
    }

    /**
     * 更新一条记录
     */
    public function updateAction() {

        if (!RequestHelper::getIsPostRequest()) {
            $this->render('update');
            ZP::app()->end();
        }

        $id = intval($this->postParam('id', 0)); // intval return 0 on failure

        if (0 === $id || empty($_POST['product_id']) || empty($_POST['product_name'])) {
            $this->error(ErrorCode::INVALID_PARAM)
                ->json();
        }

        $m = new App($_POST);

        $res = $m->update();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 添加应用记录
     * @method GET|POST
     */
    public function addAction() {

        // 判断是否是POST请求
        if ( !RequestHelper::getIsPostRequest()) {
            $this->render('add');
            ZP::app()->end();
        }
        // 处理添加数据的请求
        // 判断必填数据是否存在了
        if (empty($_POST['product_id']) || empty($_POST['product_name'])) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $m = new App($_POST);
        $res = $m->insert();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 根据ID删除记录
     * @method POST
     */
    public function deleteAction() {
        $id = $this->postParam('id');

        if (empty($id)) {
            $this->error(ErrorCode::INVALID_PARAM)
                ->json();
        }
        $this->retObj->setData(array('result' => App::deleteById(intval($id))) );
        $this->retObj->json();
    }

    /**
     * 获取相应id的app的信息
     * @method GET
     */
    public function infoAction() {
        $id = $this->getParam('id', 1);
        $app = App::findById(intval($id));

        $this->retObj->setData(array('data' => $app))->json();
    }

    /**
     * 通过一个id数组返回所有相关应用的数据
     * @method GET
     * @param array id[] 记得带[]
     */
    public function getByListAction() {
        $ids = $this->getParam('id');

        if (empty($ids) || !is_array($ids)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }
        //var_dump($ids); exit;
        $this->retObj->setData(App::findByIdList($ids))->json();
    }

}