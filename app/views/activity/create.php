<?php

?>

<h1>Добавить событие</h1>

<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'body')->textarea()?>
    <?= $form->field($model, 'startDay')->input('text')?>
    <?= $form->field($model, 'endDay')->input('text')?>
    <?= $form->field($model, 'isBlocked')->checkbox()?>
    <?= $form->field($model, 'isRepeated')->checkbox()?>
    <?=$form->field($model,'repeatType')->dropDownList($model::REPEAT_TYPE)?>
    <?= $form->field($model, 'useNotification')->checkbox()?>
    <?= $form->field($model, 'email', ['enableAjaxValidation' => true, 'enableClientValidation' => false])->input('email')?>
    <?= $form->field($model, 'emailRepeat'); ?>

    <?= $form->field($model,'loadFile[]')->fileInput(['multiple' => true])?>

    <div class="form-group">
        <button class="btn btn-default">Создать</button>
    </div>
<?php \yii\bootstrap\ActiveForm::end();?>