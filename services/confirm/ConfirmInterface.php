<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 05.08.2016
 * Time: 16:46
 */

namespace app\services\confirm;


interface ConfirmInterface
{

    public function send($email,$text);
}
