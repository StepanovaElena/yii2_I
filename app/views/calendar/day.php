<?php

use yii\helpers\Html;
use yii\helpers\Url;

$classes = [];

if ($models) {
    $classes[] = 'activity';
} else {
    $classes[] = 'inactivity';
}

if ($date->format('Ymd') == date('Ymd')) {
    $classes[] = 'today';
}

?>

<td <?= count($classes) ? 'class="' . implode(' ', $classes) . '"' : '' ?>>
    <div class="day-box">
        <div>
            <?php if ($date->format('Ymd') == date('Ymd')): ?>
                <a href="<?= Yii::$app->urlManager->createUrl('day/show')?>">
                    <span class="date-box"><?= $date->format('j') ?></span>
                </a>
                <?php else: ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['day/find', 'day' => $date->format('Y-m-j')]) ?>">
                    <span class="date-box"><?= $date->format('j') ?></span>
                </a>
                <?php endif; ?>
        </div>
        <div class="model-box">
            <?= $dayRender ?>
        </div>
    </div>
</td>
