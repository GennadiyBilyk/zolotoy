<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 05.08.2016
 * Time: 16:48
 */

namespace app\models;


use app\services\confirm\ConfirmInterface;


class Confirm implements ConfirmInterface
{




    public function send($confirm_code)
    {

        //Отправка ссылки на почту

    }

}