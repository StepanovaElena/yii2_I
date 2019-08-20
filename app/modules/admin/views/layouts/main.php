<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | Панель управления</title>
        <?php $this->head() ?>
    </head>
    <body>
<?php $this->beginBody() ?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Панель управления',
        'brandUrl' => Url::to(['/admin/default/index']),
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Пользователи', 'url' => ['/admin/user/index']],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Выйти', 'url' => ['/admin/admin/logout']],
        ],
    ]);
    NavBar::end();
    ?>
</header>

<div class="container">
    <?= $content; ?>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy;</p>
    </div>
</footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
