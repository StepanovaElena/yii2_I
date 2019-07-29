<?php

?>

<h2>Сегодня:<?= date("d/m/Y")?></h2>
<?= \yii\helpers\Html::a('Добавить задачу', ['activity/create'], ['class' => 'btn btn-default']) ?>

<h2>Список задач</h2>

<div>
    <p><?=$model->activity['title']?> : <?=$model->activity['body']?> Дата окончания: <?=$model->activity['endDay']?></p>
    <button class="btn btn-default">Редактировать</button>
</div>





