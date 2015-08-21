<?php
/**
 * Created by PhpStorm.
 * User: wuxu#zplay.cn
 * Date: 2015/8/20
 * Time: 18:07
 */

namespace cat;


use libs\Category;
use libs\Exception\ErrorCode;
use libs\Helper\RequestHelper;
use libs\ZP;
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
        if (empty($_POST['abbr']) || empty($_POST['lang'])) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $m = new Lang($_POST);
        $res = $m->insert();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 更新一条记录
     * 需要上传id及所有字段
     * @todo 覆盖就字段来实现更新，而不是全部重写
     */
    public function updateAction() {

        if (!RequestHelper::getIsPostRequest()) {
            $this->render('update');
            ZP::app()->end();
        }

        $id = intval($this->postParam('id', 0)); // intval return 0 on failure

        if (0 === $id || empty($_POST['abbr']) || empty($_POST['lang'])) {
            $this->error(ErrorCode::INVALID_PARAM)
                ->json();
        }

        $m = new Lang($_POST);

        $res = $m->update();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    public function deleteAction() {
        $id = $this->postParam('id');

        if (empty($id)) {
            $this->error(ErrorCode::INVALID_PARAM)
                ->json();
        }
        $this->retObj->setData(array('result' => Lang::deleteById(intval($id))) );
        $this->retObj->json();

    }


}