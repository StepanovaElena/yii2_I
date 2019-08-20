<?php

namespace app\components;

use app\models\Activity;
use yii\base\Component;
use yii\console\Application;
use yii\helpers\Console;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;

    public function sendNotificationToActivity(array $activities)
    {
        /** @var Activity $activity */
        foreach ($activities as $activity) {
            $ok = $this->mailer->compose('notification', ['model' => $activity])
                ->setSubject('Событие стартует сегодня')
                ->setFrom('stepanova_eg@bk.ru')
                ->setTo($activity->email_fld)
                ->send();
            if (\Yii::$app instanceof Application) {
                if ($ok) {
                    echo Console::ansiFormat('Письмо отправлено ' . $activity->email_fld, [
                            Console::FG_GREEN,
                            Console::BG_PURPLE
                        ]) . PHP_EOL;
                } else {
                    echo 'Ошибка отправки письма ' . $activity->email_fld . PHP_EOL;
                }
            }
        }
    }
}