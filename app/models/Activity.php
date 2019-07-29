<?php


namespace app\models;

use app\models\validators\TitleValidation;
use yii\base\Model;

class Activity extends Model
{

    public $title;
    public $startDay;
    public $endDay;
    public $userID;
    public $body;
    public $isBlocked;

    public $isRepeated;
    public $repeatType;


    public $email;
    public $emailRepeat;
    public $useNotification;

    public $loadFile;

    const REPEAT_TYPE=[
        0=>'Каждый день',
        1=>'Каждую неделю'
    ];

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'userID' => 'ID автора',
            'body' => 'Описание события',
            'isBlocked' => 'Заблокировать',
            'isRepeated' => 'Повторять',
            'repeatType' => 'Период повторения',
            'email' => 'Добавить e-mail',
            'emailRepeat' => 'Подтвердить e-mail',
            'useNotification' => 'Отправить уведомление'
        ];
    }

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y', $this->startDay);
        if ($date) {
            $this->startDay = $date->format('Y-m-d');
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            [['title', 'body', 'email'], 'trim'],
            [['title', 'body', 'endDay'], 'required', 'message'=>'Обязательно!!!'],
            ['body', 'string', 'min' => 5, 'max' => 300],
            [['startDay', 'endDay'], 'string'],
            ['startDay', 'date', 'format' => 'php:Y-m-d'],
            [['isBlocked', 'isRepeated', 'useNotification'], 'boolean'],
            ['repeatType','in','range' => array_keys(self::REPEAT_TYPE)],
            ['email', 'email'],
            ['email', 'required', 'when' => function (Activity $model) {
                return $model->useNotification ? true : false;
            }],
            ['emailRepeat','compare','compareAttribute' => 'email'],
            ['title',TitleValidation::class,'list' => ['admin','Шаурма']],
            ['loadFile','file','extensions' => ['jpg','png','pdf'], 'maxFiles' => 5]

            //['phone', 'string', 'length' => 10]
            //['title','titleValidate'],
            //['title','match','pattern' => '/^[a-z]{0,}/ig'],
        ];
    }

    /*
    public function titleValidate($attr)
    {
        if($this->title=='admin'){
            $this->addError('title','Запрещенное название события');
        }
    }
    */

}