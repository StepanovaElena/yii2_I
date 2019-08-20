<?php
?>

<div class="row">

<h1>Добавить пользователя</h1>

<div class="col-md-6"">
    <?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'email_fld', ['enableLabel' => false])->textInput(['placeholder' => 'Email', 'class'=>'form-control text-left']) ?>
    <?= $form->field($model, 'password', ['enableLabel' => false])->passwordInput(['placeholder' => 'Password', 'class'=>'form-control text-left']) ?>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Добавить</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>

</div>
