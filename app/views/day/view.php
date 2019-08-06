<?php
?>

<h2>Список событий на <?= $day?></h2>

<?php if (is_array($model)): ?>

    <?php foreach ($model as $item): ?>
        <div style="padding: 10px; box-sizing: border-box; margin-bottom: 20px; border: 1px solid black">
            <h4><?= $item["title_fld"] ?></h4>
            <p>Дата окончания: <?= $item["endDay_fld"] ?></p>
            <p><?= $item["body_fld"] ?></p>
            <a class="btn btn-primary"
               href="<?= Yii::$app->urlManager->createUrl(['activity/edit', 'id' => $item['id_fld']]) ?>">
                <span>Редактировать</span>
            </a>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p><?= $model ?></p>
<?php endif; ?>
