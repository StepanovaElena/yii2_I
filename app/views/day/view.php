<?php

?>

<h2>Список событий на</h2>
<? if (is_array($model)): ?>
    <?
    /* Не срабатывает переборка значений
     * <? foreach ($model as $item): ?>
            <div>
                <p><?= $item["title_fld"] ?> : <?= $item["body_fld"] ?> Дата
                    окончания: <?= $item["endDay_fld"] ?></p>
                <button class="btn btn-default">Редактировать</button>
            </div>
        <? endforeach; ?>*/
    ?>
<? else: ?>
    <p><?= $model ?></p>
<? endif; ?>
