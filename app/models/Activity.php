<?php


namespace app\models;

use app\models\validators\TitleValidation;

/**
 * This is the model class for table "{{%activity_tbl}}".
 *
 * @property int $id_fld
 * @property string $title_fld
 * @property string $startDay_fld
 * @property string $endDay_fld
 * @property int $userID_fld
 * @property string $body_fld
 * @property int $isBlocked_fld
 * @property int $isRepeated_fld
 * @property string $repeatType_fld
 * @property string $email_fld
 * @property int $useNotification_fld
 * @property string $createAt_fld
 *
 * @property Users $userIDFld
 */

class Activity extends ActivityBase
{
    public $emailRepeat;

    public $loadFile;

    const REPEAT_TYPE=[
        0=>'Каждый день',
        1=>'Каждую неделю',
        2=>'Каждый месяц',
        3=>'Каждый год'

    ];

    public function attributeLabels()
    {
        return [
            'title_fld' => 'Название события',
            'startDay_fld' => 'Дата начала',
            'endDay_fld' => 'Дата завершения',
            'userID_fld_fld' => 'ID автора',
            'body_fld' => 'Описание события',
            'isBlocked_fld' => 'Заблокировать',
            'isRepeated_fld' => 'Повторять',
            'repeatType_fld' => 'Период повторения',
            'email_fld' => 'Добавить e-mail',
            'emailRepeat' => 'Подтвердить e-mail',
            'useNotification_fld' => 'Отправить уведомление'
        ];
    }

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y', $this->startDay_fld);
        if ($date) {
            $this->startDay_fld = $date->format('Y-m-d');
        }

        $dateEnd = \DateTime::createFromFormat('d.m.Y', $this->endDay_fld);
        if (empty($dateEnd)) {
            $this->endDay_fld = $this->startDay_fld;
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            [['title_fld', 'body_fld', 'email_fld'], 'trim'],
            [['title_fld', 'body_fld', 'startDay_fld'], 'required', 'message'=>'Обязательно!!!'],
            ['body_fld', 'string', 'min' => 5, 'max' => 300],
            [['startDay_fld', 'endDay_fld'], 'string'],
            ['startDay_fld', 'date', 'format' => 'php:Y-m-d'],
            [['isBlocked_fld', 'isRepeated_fld', 'useNotification_fld'], 'boolean'],
            ['repeatType_fld','in','range' => array_keys(self::REPEAT_TYPE)],
            ['email_fld', 'email'],
            ['email_fld', 'required', 'when' => function (Activity $model) {
                return $model->useNotification_fld ? true : false;
            }],
            ['emailRepeat','compare','compareAttribute' => 'email_fld'],
            ['title_fld',TitleValidation::class,'list' => ['admin','Шаурма']],
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