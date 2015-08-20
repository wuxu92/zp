<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/20
 * Time: 14:59
 */

namespace cat;


use libs\Category;
use libs\Exception\ErrorCode;
use libs\Helper\RequestHelper;
use libs\ZP;
use model\Channel;
use model\Mmid;

class ChannelCat extends Category{

    /**
     * 根据分页列出数据
     * @method GET
     * @param page int 当前分页，从1开始
     * @param size int 分页的大小,默认20
     */
    public function listAction() {
        $page = $this->getParam('page', 1);
        $size = $this->getParam('size', 20);
        $apps = Channel::getByPage($page, $size);
        $this->retObj->append($apps)->json();
    }

    /**
     * 添加一条记录，GET请求返回表单页面，POST请求插入数据
     * TODO mmid的插入问题
     * @method GET|POST
     */
    public function addAction() {
        if ( !RequestHelper::getIsPostRequest()) {
            $this->render('add');
            ZP::app()->end();
        }

        if (empty($_POST['channel_id'])) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $c = new Channel($_POST);

        $res = $c->insert();
        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 根据id删除记录
     * @method POST
     * @param id int
     */
    public function deleteAction() {
        $id = $this->postParam('id');

        if (empty($id)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $res = Channel::deleteById(intval($id));

        $this->retObj->setData(array('result' => $res))
            ->json();
    }

    /**
     * 根据ID获取渠道的信息
     * @method GET
     * @param id
     */
    public function infoAction() {

        $id = intval($this->getParam('id'));

        if ($id === 0 || empty($id)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $c = Channel::findById($id);
        $this->retObj->setData($c)
            ->json();
    }

    /**
     * 根据渠道id获取渠道信息
     * @method GET
     * @param channel_id
     */
    public function infoByChannelIdAction() {
        $channelId = $this->getParam('channel_id');
        //$channelId = intval($channelId);

        if ($channelId === 0 || empty($channelId)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $c = Channel::instanceByChannelId($channelId);

        $this->retObj->setData($c)
            ->json();
    }

    /**
     * 根据mmid获取渠道信息
     * @method GET
     * @param mmid
     */
    public function infoByMmidAction() {
        $mmid = $this->getParam('mmid');
        //$mmid = intval($mmid);
        if ($mmid === 0 || empty($mmid)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }

        $c = Mmid::getChannelByMmid($mmid);
        $this->retObj->setData($c)
            ->json();
    }

    /**
     * 通过一个id数组返回所有相关应用的数据, copy from AppCat
     * @method GET
     * @param array id[] 记得带[]
     */
    public function getByListAction() {
        $ids = $this->getParam('id');

        if (empty($ids) || !is_array($ids)) {
            $this->error(ErrorCode::INVALID_PARAM, true);
        }
        //var_dump($ids); exit;
        $this->retObj->setData(Channel::findByIdList($ids))->json();
    }


}