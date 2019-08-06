<?php


namespace app\controllers\actions\activity;


use app\behaviours\DateCreateBehaviour;
use yii\base\Action;
use yii\web\HttpException;

class ViewAction extends Action
{
    public function run($id)
    {
        \Yii::$app->logIt();

        $model = \Yii::$app->activity->getActivityById($id);

        if (!$model) {
            throw new HttpException(404, 'activity not found');
        }

        if (!\Yii::$app->rbac->canEditViewActivity($model)) {
            throw new HttpException(403, 'Activity not for you');
        }

        $model->attachBehavior('creatD',['class'=>DateCreateBehaviour::class,'attributeName'=>'createAt_fld']);

        //$model->detachBehavior('creatD'); отключение поведения

        return $this->controller->render('view', ['model' => $model]);
    }
}