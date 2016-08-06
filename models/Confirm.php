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


    public function send($email, $text)
    {
        $subject = '';
        $from_email = '';
        $from_name = '';
        //Отправка ссылки на почту

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$from_email => $from_name])
                ->setSubject($subject)
                ->setTextBody($text)
                ->send();




    }

}