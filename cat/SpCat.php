<?php
/**
 * Created by PhpStorm.
 * User: wuxu#zplay.cn
 * Date: 2015/8/20
 * Time: 18:28
 */

namespace cat;


use libs\Category;
use libs\Exception\ErrorCode;
use libs\Helper\RequestHelper;
use libs\ZP;
use model\Sp;

class SpCat extends Category {

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
        $apps = Sp::getByPage($page, $size);
        $this->retObj->setData($apps)->json();
    }

    /**
     * 根据运营商代码返回信息，可能有多个值，故返回data为数组
     * @method GET
     * @param code string(int) 代码，比如 31
     */
    public function listOfCodeAction() {
        $code = $this->getParam('code');
        if (empty($code)) {
            $this->error(ErrorCode::INVALID_PARAM);
        }
        $sp = Sp::getByCondition('code', $code);

        $this->retObj->setData($sp)
            ->json();
    }

    /**
     * 列出一个国家的所有运营商的信息
     * @method GET
     * @param country string 国家名，汉字，比如“中国”
     */
    public function listOfCountryAction() {
        $country = $this->getParam('country');
        if (empty($country)) {
            $this->error(ErrorCode::INVALID_PARAM);
        }

        $sps = Sp::getByCondition('country', $country);

        $this->retObj->setData($sps)->json();
    }

    public function listOfPlmnAction() {
        $plmn = $this->getParam('plmn');

        if (empty($plmn)) {
            $this->error(ErrorCode::INVALID_PARAM);
        }

        $sps = Sp::getByCondition('plmn', $plmn);

        $this->retObj->setData($sps)->json();
    }

    public function infoBySpNameAction() {
        $name = $this->getParam('name');

        if (empty($name)) {
            $this->error(ErrorCode::INVALID_PARAM);
        }

        $sps = Sp::getByCondition('name', $name);

        $this->retObj->setData($sps)->json();
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
        if (empty($_POST['name']) || empty($_POST['code'])) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $sp = new Sp($_POST);
        $res = $sp->insert();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 根据id删除一条记录
     * @method POST
     * @param id int
     */
    public function deleteAction() {
        $id = $this->postParam('id');
        $id = intval($id);

        if (empty($id)) {
            $this->error(ErrorCode::INVALID_PARAM);
        }

        $res = Sp::deleteById($id);

        $this->retObj->setData(array(
            'result' => $res
        ))
            ->json();

    }

}