<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fld',
            'title_fld',
            'startDay_fld',
            'endDay_fld',
            'userID_fld',
            //'body_fld',
            //'isBlocked_fld',
            //'isRepeated_fld',
            //'repeatType_fld',
            //'email_fld:email',
            //'useNotification_fld',
            //'createAt_fld',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
