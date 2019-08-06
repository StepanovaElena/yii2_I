<?php
/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>

<div class="row">
    <?= \app\widgets\MessageWidget\MessageWidget::widget(['message' => 'Good morning!']) ?>

    <div style="width: 50%; margin-bottom: 30px">
        <h2>Авторизация</h2>
        <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

        <?= $form->field($model, 'email_fld', ['enableLabel' => false])->textInput(['placeholder' => 'Email', 'class'=>'form-control text-left']) ?>
        <?= $form->field($model, 'password', ['enableLabel' => false])->passwordInput(['placeholder' => 'Password', 'class'=>'form-control text-left']) ?>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Авторизация</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
    <div>
        <h4>Ещё не зарегистрированы?</h4>
        <?= \yii\helpers\Html::a('Зарегистрироваться', ['/auth/signup/'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>