<?php


namespace app\components;



use yii\base\Component;

class DayComponent extends Component
{
    public $classEntity;

    public function getEntity()
    {
        return new $this->classEntity;
    }

    public function getActivity(&$model)
    {
        $today = (date('Y-m-d'));

    }

}