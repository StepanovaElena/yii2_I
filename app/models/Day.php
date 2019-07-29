<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $activity;
    public $type;

    const DAY_TYPE=[
        0=>'Рабочий день',
        1=>'Выходной день'
    ];

    public function attributeLabels()
    {
        return [
            'title' => 'Перечень событий',
            'type' => 'Вид дня',
        ];
    }

    public function rules()
    {
        return [
            ['type', 'string', 'required'],
            ['type','in','range' => array_keys(self::DAY_TYPE)]
        ];
    }

}