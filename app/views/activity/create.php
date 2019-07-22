<?php
var_dump(\Yii::$app->request->referrer);
?>

<h1>Добавить событие</h1>

<h2>Сегодня:<?= date("d/m/Y") ?></h2>
<h2>Список задач</h2>
<p><?=$activity->activity?></p>



<?php $form = \yii\bootstrap\ActiveForm::begin()?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'body')->textarea()?>
    <?= $form->field($model, 'startDay')->input('date')?>
    <?= $form->field($model, 'endDay')->input('date')?>
    <?= $form->field($model, 'isBlocked')->checkbox()?>
    <?= $form->field($model, 'isRepeated')->checkbox()?>
    <div class="form-group">
        <button class="btn btn-default">Создать</button>
    </div>
<?php \yii\bootstrap\ActiveForm::end();?>