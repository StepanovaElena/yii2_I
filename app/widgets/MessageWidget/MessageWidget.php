<?php


namespace app\widgets\MessageWidget;


use Yii;
use yii\base\Widget;

class MessageWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();

        $this->registerTranslations();

        if (!is_null($this->message)) {
            return;
        }

        $hour = date('G');
        if ($hour >= 0 && $hour < 6) {
            $this->message = Yii::t('message', 'Good night!');
        } elseif ($hour >= 6 && $hour < 12) {
            $this->message = Yii::t('message', 'Good morning!');
        } elseif ($hour >= 12 && $hour < 18) {
            $this->message = Yii::t('message', 'Good afternoon!');
        } else {
            $this->message = Yii::t('message', 'Good evening!');
        }
    }

    public function run()
    {
        return $this->render('index', ['message' => $this->message]);
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['message'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/widgets/MessageWidget/messages',
            'fileMap' => [
                'message' => 'message.php']
        ];
    }

}