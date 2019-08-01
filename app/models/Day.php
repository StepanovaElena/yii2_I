<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $activity;
    public $type;
    public $startDay;

    const DAY_TYPE=[
        0=>'Рабочий день',
        1=>'Выходной день'
    ];

    public function attributeLabels()
    {
        return [
            'activity' => 'Перечень событий',
            'type' => 'Вид дня',
            'startDay' => 'Дата начала события'
        ];
    }

    public function rules()
    {
        return [
            ['startDay', 'string'],
            ['startDay', 'date', 'format' => 'php:Y-m-d'],
            ['type', 'string'],
            ['type','in','range' => array_keys(self::DAY_TYPE)]
        ];
    }

}