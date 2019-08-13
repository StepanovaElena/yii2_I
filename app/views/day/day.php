<?php

?>

<h2>Сегодня:<?= date("d.m.Y") ?></h2>
<?= \yii\helpers\Html::a('Добавить задачу', ['activity/create'], ['class' => 'btn btn-success']) ?>

<h2>Список событий на сегодня</h2>

<?php if (!empty($model->activity)): ?>

    <?php foreach ($model->activity as $item): ?>
        <div style="padding: 10px; box-sizing: border-box; margin-bottom: 20px; border-bottom: 1px solid black">
            <h4><?= $item["title_fld"] ?></h4>
            <p>Дата окончания: <?= $item["endDay_fld"] ?></p>
            <p><?= $item["body_fld"] ?></p>
            <a class="btn btn-primary"
               href="<?= Yii::$app->urlManager->createUrl(['activity/edit', 'id' => $item['id_fld']]) ?>">
                <span>Редактировать</span>
            </a>
            <?= \yii\helpers\Html::a('Удалить', ['activity/delete', 'id' => $item['id_fld']], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить данную активность?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <h4>В этот день нет ни одного события.</h4>
<?php endif; ?>

<h4 style="margin-top: 50px">Введите дату для поиска:</h4>

<?php $form = \yii\bootstrap\ActiveForm::begin() ?>
<?= $form->field($model, 'startDay', ['enableLabel' => false])->input('text') ?>
<div class="form-group">
    <button class="btn btn-primary">Найти события</button>
</div>
<?php \yii\bootstrap\ActiveForm::end(); ?>



