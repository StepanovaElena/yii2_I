<?php
foreach ($model as $item) {
    echo \yii\helpers\Html::img('/loaded_files/' . $item, ['width' => 150]);
}


/*Не получается перебрать цикл в таком виде
<p>Заголовок <strong></strong></p>
<? foreach ($model as $item):?>
<img src="/loaded_files/<?= $item?>" alt="">
<?end foreach?>
ругается на переменную $item

*/




