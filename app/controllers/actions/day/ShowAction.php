<?php


namespace app\controllers\actions\day;


use yii\base\Action;

class ShowAction extends Action
{
    public $classEntity;

    public function run() {

        $dayComponent = \Yii::createObject(['class' => \app\components\DayComponent::class, 'classEntity' => \app\models\Day::class]);
        $day = $dayComponent->getEntity();

        $today = (date('Y-m-d'));
        if(\Yii::$app->session['activity']['startDay'] === $today) {
            $day->activity = \Yii::$app->session['activity'];
        };

        return $this->controller->render('day', ['model'=>$day]);
    }
}