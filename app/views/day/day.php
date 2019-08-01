<?php
   ?>

<h2>Сегодня:<?= date("d.m.Y")?></h2>
<?= \yii\helpers\Html::a('Добавить задачу', ['activity/create'], ['class' => 'btn btn-default']) ?>

<h2>Список событий на сегодня</h2>

<p><?= print_r($model->activity) //не получается перебрать циклом ?></p>

<h1>Введите дату</h1>

<?php $form = \yii\bootstrap\ActiveForm::begin() ?>
<?= $form->field($model, 'startDay')->input('text') ?>
<div class="form-group">
    <button class="btn btn-default">Найти события</button>
</div>
<?php \yii\bootstrap\ActiveForm::end(); ?>



