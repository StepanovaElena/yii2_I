<?php


namespace app\controllers\actions\activity;


use app\models\Activity;
use yii\base\Action;

class CreateAction extends Action
{
    public $classEntity;

    public function run(){

        $dayComponent = \Yii::createObject(['class' => \app\components\DayComponent::class, 'classEntity' => \app\models\Day::class]);

        $day = $dayComponent->getEntity();

        $activityComponent = \Yii::createObject(['class' => \app\components\ActivityComponent::class, 'classEntity' => \app\models\Activity::class]);

        /** @var Activity $activity*/
        //$activity = \Yii::$app->activity->getEntity();
        $activity = $activityComponent->getEntity();

        if (\Yii::$app->request->isPost) {
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->activity->createActivity($activity)) {
                return $this->controller->redirect('/');
            }
        }

        return $this->controller->render('create', ['model'=>$activity, 'activity' => $day]);
    }
}