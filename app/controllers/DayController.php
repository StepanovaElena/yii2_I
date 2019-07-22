<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\Day;

class DayController extends BaseController
{
    public function actions()
    {
        return [
            'get'=>[
                //'class'=>
                'classEntity'=> Day::class
            ]
        ];
    }
}