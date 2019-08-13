<?php


namespace app\controllers\actions\activity;


use yii\base\Action;
use yii\web\HttpException;

class DeleteAction extends Action
{
    public function run($id)
    {
        $activity = \Yii::$app->activity->getActivityById($id);

        if (!$activity) {
            throw new HttpException(404, 'Activity not found!');
        }



        if (\Yii::$app->activity->deleteActivity($activity)) {
            return $this->controller->render('/activity/delete-success');
        }

        return $this->controller->render('/activity/delete-false');
    }
}