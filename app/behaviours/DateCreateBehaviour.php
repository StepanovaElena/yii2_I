<?php


namespace app\behaviours;


use yii\base\Behavior;

class DateCreateBehaviour extends Behavior
{
    public $attributeName;

    public function getDateCreated()
    {
        $date = $this->owner->{$this->attributeName};

        return \Yii::$app->formatter->asDatetime($date, 'php:d.m.Y H:i:s');
    }
}