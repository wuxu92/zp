<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/30
 * Time: 10:17
 */

namespace libs;


use model\RenderObject;

class Category {

    public $layout = '/layout/main.php';

    /**
     * @var RenderObject
     */
    public $retObj;

    public function __construct() {
        $this->retObj = new RenderObject();
    }

    public function postParam($idx, $default=null)
    {
        if (empty($_POST[$idx])) return $default;
        return $_POST[$idx];
    }

    public function getParam($idx, $default = null)
    {
        if (empty($_GET[$idx])) {
            return $default;
        }
        return $_GET[$idx];
    }

    /**
     * RenderObject 的json方法代理
     * @return $this
     */
    public function json() {
        $this->retObj->json(true, 0);
        return $this;
    }

    /**
     * RenderObject 的error方法代理
     * @param $code
     * @param bool $exit
     * @return $this
     */
    public function error($code, $exit = false)
    {
        $this->retObj->error($code, $exit);
        return $this;
    }

    /**
     * 渲染文件，默认先渲染layout
     * @param $viewFile
     * @param $param
     */
    public function render($viewFile, $param=array()) {
        // 如果不是绝对view，获取cat
        if (false === strpos($viewFile, '/')) {
            $cat = get_class($this);
            if (false !== strpos($cat, "\\")) {
                $cat = substr($cat, strpos($cat, "\\")+1);
            }
            $cat = substr($cat, 0, strlen($cat)-3 );
            $cat = lcfirst($cat);
            $viewFile = $cat . '/' . $viewFile;
        }

        $file = APP_ROOT . '/view/' . $viewFile . '.php';
        $output = $this->renderPhpFile($file, $param);
        $output = $this->renderPhpFile(APP_ROOT . '/view' . $this->layout, array('content'=>$output));

        echo $output;
    }

    public function renderPartial($viewFile, $param = array()) {
        // 如果不是绝对view，获取cat
        if (false === strpos($viewFile, '/')) {
            $cat = get_class($this);
            if (false !== strpos($cat, "\\")) {
                $cat = substr($cat, strpos($cat, "\\")+1);
            }
            $cat = substr($cat, 0, strlen($cat)-3 );
            $cat = lcfirst($cat);
            $viewFile = $cat . '/' . $viewFile;
        }

        $file = APP_ROOT . '/view/' . $viewFile . '.php';


        $output = $this->renderPhpFile($file, $param);

        echo $output;
    }

    private function renderPhpFile($_file_, $_params_ = array())
    {
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);
        require($_file_);

        return ob_get_clean();
    }
}