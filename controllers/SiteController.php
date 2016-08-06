<?php

namespace app\controllers;

use app\models\Letter;
use app\models\Signup;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;


class SiteController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    private function redirectIfLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    }

    public function actionInfo()
    {
        return $this->render('info');
    }

    public function actionSignup()
    {

        $this->redirectIfLogin();


        $model = new Signup();

        if (Yii::$app->request->method === 'POST') {
            $model->attributes = Yii::$app->request->post('Signup');
            if ($model->validate()) {
                $model->signup();
                \Yii::$app->getSession()->setFlash('message', 'Вы успешно зарегистрировались! Осталось подтвердить email.');
                return $this->redirect('/site/info');
            }
        }


        return $this->render('signup', ['model' => $model]);

    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        $this->redirectIfLogin();

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionLetters()
    {
        $letters = Letter::find()->orderBy('created_at desc')->all();
        return $this->render('letters', ['letters' => $letters]);
    }


    public function actionConfirm($code)
    {

        if (User::confirm($code)) {
            \Yii::$app->getSession()->setFlash('message', 'Ура! Вы подтвердили email и можете <a href="/site/login">войти.</a>');
            return $this->redirect('/site/info');
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Что-то пошло не так. Возможно есть ошибки в ссылке, или email уже подтвержден.');
            return $this->redirect('/site/info');
        }

    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

}
