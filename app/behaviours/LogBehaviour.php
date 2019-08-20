<?php


namespace app\behaviours;


use app\components\ActivityComponent;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class LogBehaviour extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'logIt',
            ActivityComponent::EVENT_CUSTOM_EVENT => 'logIt'
        ];
    }

    public function logIt()
    {
        \Yii::warning('this log from behavior');
    }
}