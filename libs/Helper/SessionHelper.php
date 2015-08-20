<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/17
 * Time: 10:17
 */

namespace libs\Helper;


class SessionHelper {

    public static function get($name, $default = null) {
        return isset($_SESSION[$name])?$_SESSION[$name]:$default;
    }

    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function remove($key) {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            session_unset($key);
            return $value;
        } else {
            return null;
        }
    }

    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    public static function destroy() {
        session_destroy();
    }

    /**
     * 判断session是否已经开启
     * @return bool
     */
    public static function getIsActive() {
        return session_status() === PHP_SESSION_ACTIVE;
    }
}