<?php if(!empty(Yii::$app->session->getFlash('message'))) { ?>
<div class="alert alert-info">
    <?= Yii::$app->session->getFlash('message'); ?>
</div>
<?php } ?>

<?php if(!empty(Yii::$app->session->getFlash('error'))) { ?>
<div class="alert alert-danger">
    <?= Yii::$app->session->getFlash('error'); ?>
</div>
<?php } ?>