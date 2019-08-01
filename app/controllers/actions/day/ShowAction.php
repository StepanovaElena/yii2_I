<?php


namespace app\controllers\actions\day;


use app\models\Activity;
use yii\base\Action;

class ShowAction extends Action
{
    public $classEntity;

    public function run() {

        $dayComponent = \Yii::createObject(['class' => \app\components\DayComponent::class, 'classEntity' => \app\models\Day::class]);
        $day = $dayComponent->getEntity();


        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post('Day');
            return $this->controller->redirect(['day/find', 'day' => $post['startDay']]);
        }

        $today = (date('Y-m-d'));
        $id = \Yii::$app->user->getId();

        $activity = Activity::find()
            ->where(['startDay_fld' => $today, 'userID_fld' => $id])
            ->asArray()
            ->all();

        if (!$activity) {
            $activity = 'В этот день задачи не назначены';
        }

        $day->activity = $activity;

        return $this->controller->render('day', ['model'=>$day]);
    }
}