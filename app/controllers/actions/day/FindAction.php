<?php


namespace app\controllers\actions\day;


use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;


class FindAction extends Action
{
    public function run($day) {

            $id = \Yii::$app->user->getId();

            $model = Activity::find()
                ->where(['startDay_fld' => $day, 'userID_fld' => $id])
                ->asArray()
                ->all();

            if (!$model) {
                $model = 'В этот день задачи не назначены';
            }

        return $this->controller->render('view', ['model' => $model]);
    }

}