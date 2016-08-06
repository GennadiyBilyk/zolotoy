<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 05.08.2016
 * Time: 14:14
 */

namespace app\models;


use app\services\confirm\ConfirmInterface;
use yii\base\Model;
use Yii;


class Signup extends Model
{

    private $confirm_code;

    public $captcha;
    public $email;
    public $password;
    public $name;

    public function __construct($config = [])
    {
        $this->confirm_code = uniqid();
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['email', 'password', 'name'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 2, 'max' => 10],
            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }


    private function makeLetter()
    {
        $link = Yii::$app->request->hostInfo . '/site/confirm?code=' . $this->confirm_code;
        $letter = 'Для подтверждения почтового ящика перейдите по ссылке <a href="' . $link . '" target="_blank">http://' . $link . '</a>';
        return $letter;
    }

    /*
     * отправления кода для подтверждения регистрации
     */
    private function sendConfirm(ConfirmInterface $confirm)
    {


        $text = $this->makeLetter();
        $email = $this->email;
        $confirm->send($email, $text);

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'password'=>'Пароль',
            'captcha' => 'Введите текст с картинки'];
    }


    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->name = $this->name;
        $user->confirm_code = $this->confirm_code;

        if ($user->save()) {
            $this->sendConfirm(new ConfirmDb);
            return $user;
        } else {
            return false;
        }


//        $user->save();
//        var_dumP($user->getErrors());exit;


    }
}