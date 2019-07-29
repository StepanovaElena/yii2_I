<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\day\ShowAction;
use app\models\Day;

class DayController extends BaseController
{
    public function actions()
    {
        return [
            'show'=>[
                'class'=> ShowAction::class,
                'classEntity'=> Day::class
            ]
        ];
    }
}