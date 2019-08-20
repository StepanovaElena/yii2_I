<?php


namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class NotificationController extends Controller
{
    public $name;

    public function options($actionID)
    {
        return [
            'name'
        ];
    }

    public function optionAliases()
    {
        return [
            'n' => 'name'
        ];
    }

    public function actionSendToday()
    {
        $activities = \Yii::$app->activity->getActiveActivityTodayNotification();

        echo count($activities);
        /** @var NotificationComponent $notification */

        $notification = \Yii::createObject([
            'class' => NotificationComponent::class,
            'mailer' => \Yii::$app->mailer]);

        $notification->sendNotificationToActivity($activities);
    }

    public function actionTest()
    {
        echo 'this test console controller' . PHP_EOL;
//        echo $name.PHP_EOL;
        echo $this->name . PHP_EOL;
//        print_r($args);
    }
}