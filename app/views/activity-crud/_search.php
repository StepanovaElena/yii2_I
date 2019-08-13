<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fld') ?>

    <?= $form->field($model, 'title_fld') ?>

    <?= $form->field($model, 'startDay_fld') ?>

    <?= $form->field($model, 'endDay_fld') ?>

    <?= $form->field($model, 'userID_fld') ?>

    <?php // echo $form->field($model, 'body_fld') ?>

    <?php // echo $form->field($model, 'isBlocked_fld') ?>

    <?php // echo $form->field($model, 'isRepeated_fld') ?>

    <?php // echo $form->field($model, 'repeatType_fld') ?>

    <?php // echo $form->field($model, 'email_fld') ?>

    <?php // echo $form->field($model, 'useNotification_fld') ?>

    <?php // echo $form->field($model, 'createAt_fld') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
