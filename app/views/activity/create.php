<?php

?>

    <h1>Добавить событие</h1>

<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'title_fld') ?>
<?= $form->field($model, 'body_fld')->textarea() ?>
<?= $form->field($model, 'startDay_fld')->input('text') ?>
<?= $form->field($model, 'endDay_fld')->input('text') ?>
<?= $form->field($model, 'isBlocked_fld')->checkbox() ?>
<?= $form->field($model, 'isRepeated_fld')->checkbox() ?>
<?= $form->field($model, 'repeatType_fld')->dropDownList($model::REPEAT_TYPE) ?>
<?= $form->field($model, 'useNotification_fld')->checkbox() ?>
<?= $form->field($model, 'email_fld', ['enableAjaxValidation' => true, 'enableClientValidation' => false])->input('email') ?>
<?= $form->field($model, 'emailRepeat'); ?>

<?= $form->field($model, 'loadFile[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <button class="btn btn-default">Создать</button>
    </div>
<?php \yii\bootstrap\ActiveForm::end(); ?>