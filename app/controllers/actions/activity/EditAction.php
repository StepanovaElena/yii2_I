<?php


namespace app\controllers\actions\activity;

use yii\base\Action;
use yii\web\HttpException;

class EditAction extends Action
{
    public function run($id)
    {
        $activity = \Yii::$app->activity->getActivityById($id);
        if (!$activity) {
            throw new HttpException(404, 'Activity not found!');
        }

        if (!\Yii::$app->rbac->canEditViewActivity($activity)) {
            return $this->controller->render('/activity/forbidden');
        }

        if (\Yii::$app->request->isPost) {

            $activity->load(\Yii::$app->request->post());

            if (\Yii::$app->activity->editActivity($activity)) {
                return $this->controller->redirect(['/activity/view', 'id' => $activity->id_fld]);
            }
        }

        return $this->controller->render('edit', ['model' => $activity]);
    }
}