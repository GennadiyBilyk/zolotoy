<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 05.08.2016
 * Time: 17:03
 */

namespace app\models;


use app\services\confirm\ConfirmInterface;


class ConfirmDb implements ConfirmInterface
{

    public function send($email, $text)
    {

        //запись ссылки в бд
        $letter = new Letter();
        $letter->email = $email;
        $letter->text = $text;
        if ($letter->save()) {
            return true;
        } else {
            return false;
        }

    }

}