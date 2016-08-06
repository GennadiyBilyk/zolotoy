<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--        --><? //= Html::a('Create My User', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email',
            'name',


            [
                'attribute' => 'role_id',
                'label' => 'Роль',
                'content' => function ($data) {
                        return $data->role->title;
    },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Roles::find()->all(), 'id', 'title')
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
