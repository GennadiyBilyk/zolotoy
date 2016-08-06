<?php

namespace app\module\admin;

use Yii;
use yii\web\HttpException;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\module\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {

        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect('/site/login');
        }

        if (Yii::$app->user->identity->role_id != 1) {
            throw new \yii\web\HttpException(403, 'Доступ запрещён.');
        }
        parent::init();

        // custom initialization code goes here
    }
}
