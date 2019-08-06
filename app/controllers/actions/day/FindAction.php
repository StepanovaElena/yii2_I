<?php


namespace app\controllers\actions\day;

use yii\base\Action;

class FindAction extends Action
{
    public function run($day)
    {
        $id = \Yii::$app->user->getId();

        $model = \Yii::$app->activity->getAllActivityAsArray([
            'startDay_fld' => $day,
            'userID_fld' => $id
        ]);

        if (!$model) {
            $model = 'В этот день задачи не назначены.';
        }

        return $this->controller->render('view', ['model' => $model, 'day' => $day]);
    }

}