<h1>Регистрация</h1>

<?php

use \yii\widgets\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$form = ActiveForm::begin(['class'=>'form-horizontal']);


?>

<?php echo $form->field($model,'name')->textInput(['autofocus'=>true]); ?>
<?php echo $form->field($model,'email')->textInput(); ?>
<?php echo $form->field($model,'password')->passwordINput(); ?>

<?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className()) ?>

<div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</div>


<?php ActiveForm::end(); ?>