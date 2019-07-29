<?php


namespace app\controllers\actions\activity;


use app\models\Activity;
use yii\base\Action;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

class CreateAction extends Action
{
    public $classEntity;

    public function run(){

        $activityComponent = \Yii::createObject(['class' => \app\components\ActivityComponent::class, 'classEntity' => \app\models\Activity::class]);

        /** @var Activity $activity*/
        //$activity = \Yii::$app->activity->getEntity();

        $activity = $activityComponent->getEntity();

        if (\Yii::$app->request->isPost) {

            $activity->load(\Yii::$app->request->post());

            if(\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON ;
                return ActiveForm::validate($activity);
            }
            
            if(\Yii::$app->activity->createActivity($activity)) {
                //return $this->controller->redirect('/');
                return $this->controller->render('files', ['model'=>$activity->loadFile]);

            }

                \Yii::$app->session['activity'] = [
                    'title' => $activity->title,
                    'body' => $activity->body,
                    'endDay' => $activity->endDay,
                    'startDay' => $activity->startDay
            ];
        }

        return $this->controller->render('create', ['model'=>$activity]);
    }
}