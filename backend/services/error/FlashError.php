<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/27
 * Time: 15:32
 */

namespace backend\services\error;


class FlashError
{
    const SESSION_KEY='flashSessionKey';
    public static function setFlashError($message)
    {
        $session = \Yii::$app->session;
        $session->addFlash(self::SESSION_KEY, $message);
    }

    public static function getFlashError()
    {
        $session = \Yii::$app->session;
        return $session->getFlash(self::SESSION_KEY);
    }
}