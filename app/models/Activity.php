<?php


namespace app\models;


use phpDocumentor\Reflection\Types\Boolean;
use yii\base\Model;

class Activity extends Model
{
    /**
     * Название события
     *
     * @var string
     */
    public $title;

    /**
     * День начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $startDay;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $endDay;

    /**
     * ID автора, создавшего события
     *
     * @var int
     */
    public $idAuthor;

    /**
     * Описание события
     *
     * @var string
     */
    public $body;

    /**
     * Описание события
     *
     * @var Boolean
     */
    public $isBlocked;

    /**
     * Описание события
     *
     * @var Boolean
     */
    public $isRepeated;

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события',
            'isBlocked' => 'Заблокировать',
            'isRepeated' => 'Повторять'
        ];
    }


    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            ['body', 'string', 'min' => 5],
            ['startDay', 'string'],
            ['endDay', 'string'],
            [['isBlocked', 'isRepeated'], 'boolean']
        ];
    }


}