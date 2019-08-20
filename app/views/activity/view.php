<?php
/**
 * @var \app\models\Activity $model
 */
?>
<p>Заголовок: <?= $model->title_fld; ?></p>
<p>Описание: <?=$model->body_fld;?></p>
<p>Принадлежит: <?=$model->user->email_fld?></p>
<p>Дата создания: <?=$model->getDateCreated()?></p>
<p><?=Yii::t('app','Date start',[strtotime($model->startDay_fld)])?></p>
