<?php


namespace app\widgets\MessageWidget;


use yii\base\Widget;

class MessageWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();

        if (empty($this->message)) {
            $this->message = 'Hello!';
        }
    }

    public function run()
    {
        return $this->render('index', ['message' => $this->message]);
    }

}