<?php
?>

<a class="btn btn-primary"
   href="<?= Yii::$app->urlManager->createUrl('/admin/user/add') ?>">
    <span>Добавить пользователя</span>
</a>

<h4>Список пользователей</h4>

    <?php foreach ($model as $item): ?>
        <div style="padding: 10px; box-sizing: border-box; margin-bottom: 20px; border-bottom: 1px solid black">
            <h4>E-mail:<?= $item["email_fld"] ?></h4>
            <p>Дата регистрации: <?= $item["createAt_fld"] ?></p>
        </div>
    <?php endforeach; ?>



