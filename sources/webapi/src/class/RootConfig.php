<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

class RootConfig {

    private static $ROOT_PATH = 'http://localhost';
    private static $TPL_PATH = 'src/views/';
    private static $TPL_EXT = '.html';
    private static $RECAPTCHA_SECRET = '';

    public static function getROOTPATH() {
        return self::$ROOT_PATH;
    }

    public static function getTPLPATH() {
        return self::$TPL_PATH;
    }

    public static function getTPLEXT() {
        return self::$TPL_EXT;
    }

    public static function getRecaptchaSecret() {
        return self::$RECAPTCHA_SECRET;
    }

}
