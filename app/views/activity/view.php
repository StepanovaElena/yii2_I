<?php
/**
 * @var \app\models\Activity $model
 */
?>
<p>Заголовок <?= $model->title_fld; ?></p>
<p><?=$model->body_fld;?></p>
<p>Принадлежит: <?=$model->user->email?></p>

