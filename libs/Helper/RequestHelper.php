<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/12
 * Time: 18:33
 */

namespace libs\Helper;


use libs\Exception\InvalidException;
use libs\Exception\InvalidRequestException;
use libs\ZP;

class RequestHelper {

    /**
     * 判断是否是POST请求
     * @return bool
     */
    public static function getIsPostRequest()
    {
        return isset($_SERVER['REQUEST_METHOD']) && !strcasecmp($_SERVER['REQUEST_METHOD'],'POST');
    }

    /**
     * 判断是否是ajax请求
     * @return bool
     */
    public static function getIsAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';
    }


    public function getHttpVersion()
    {
        if(isset($_SERVER['SERVER_PROTOCOL']) && $_SERVER['SERVER_PROTOCOL']==='HTTP/1.0')
            return '1.0';
        else
            return '1.1';
    }

    public static function getIsSecureConnection()
    {
        return isset($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'on') === 0 || $_SERVER['HTTPS'] == 1)
        || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
    }

    public static function  resolveRequestUri() {

        if (isset($_SERVER['HTTP_X_REWRITE_URL'])) { // IIS
            $requestUri = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif (isset($_SERVER['REQUEST_URI'])) {
            $requestUri = $_SERVER['REQUEST_URI'];
            if ($requestUri !== '' && $requestUri[0] !== '/') {
                $requestUri = preg_replace('/^(http|https):\/\/[^\/]+/i', '', $requestUri);
            }
        } elseif (isset($_SERVER['ORIG_PATH_INFO'])) { // IIS 5.0 CGI
            $requestUri = $_SERVER['ORIG_PATH_INFO'];
            if (!empty($_SERVER['QUERY_STRING'])) {
                $requestUri .= '?' . $_SERVER['QUERY_STRING'];
            }
        } else {
            throw new InvalidException('Unable to determine the request URI.');
        }
        return $requestUri;
    }

    public static function getHostInfo() {
        $secure = self::getIsSecureConnection();
        $http = $secure ? 'https' : 'http';

        if (isset($_SERVER['HTTP_HOST'])) {
            return $http . '://' . $_SERVER['HTTP_HOST'];
        } else {
            $hostInfo = $http . '://' . $_SERVER['SERVER_NAME'];
            $port = $_SERVER['SERVER_PORT'];
            if (($port !== 80 && !$secure) || ($port !== 443 && $secure)) {
                $hostInfo .= ':' . $port;
            }

            return $hostInfo;
        }
    }

    public static function getAbsoluteUrl() {
        return self::getHostInfo() . self::resolveRequestUri();
    }

    /**
     * 重定向，目前只能重定向GET请求
     * @param $r
     * @param array $param
     * @throws InvalidRequestException
     */
    public static function redirect($r, $param = array()) {

        ZP::info("redirecting", null, false);

        list($cat, $act) = explode('/', $r);
        if (empty($cat) || !class_exists("cat\\" . ucfirst($cat) . 'Cat')) {
            throw new InvalidRequestException("重定向的目的参数不合法");
        }
        // if (empty($act)) $act = 'index';

        $url = self::getAbsoluteUrl();

        // replace old r with new $r
        $newUrl = substr($url, 0, strpos($url, 'index.php')) . 'index.php?r=' . $r;

        // append param
        foreach ($param as $k => $v) {
            $newUrl .= "&$k=$v";
        }

        self::_redirect($newUrl);
    }

    private static function _redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        //die();
        ZP::end();
    }


}