<h1>Регистрация</h1>

<?php

use \yii\widgets\ActiveForm;

?>

<?php

$form = ActiveForm::begin(['class'=>'form-horizontal']);


?>

<?php echo $form->field($model,'name')->textInput(['autofocus'=>true]); ?>
<?php echo $form->field($model,'email')->textInput(); ?>
<?php echo $form->field($model,'password')->passwordINput(); ?>


<div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</div>


<?php ActiveForm::end(); ?>