<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_fld')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startDay_fld')->textInput() ?>

    <?= $form->field($model, 'endDay_fld')->textInput() ?>

    <?= $form->field($model, 'userID_fld')->textInput() ?>

    <?= $form->field($model, 'body_fld')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isBlocked_fld')->textInput() ?>

    <?= $form->field($model, 'isRepeated_fld')->textInput() ?>

    <?= $form->field($model, 'repeatType_fld')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_fld')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'useNotification_fld')->textInput() ?>

    <?= $form->field($model, 'createAt_fld')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
