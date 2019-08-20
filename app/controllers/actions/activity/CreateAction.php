<?php


namespace app\controllers\actions\activity;


use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

class CreateAction extends Action
{
    public $classEntity;

    public function run()
    {

        if (!\Yii::$app->rbac->canCreateActivity()) {
            throw new HttpException(403, 'Not authorisation');
        }

        $activityComponent = \Yii::createObject([
            'class' => \app\components\ActivityComponent::class,
            'classEntity' => \app\models\Activity::class
        ]);

        /** @var Activity $activity */
        //$activity = \Yii::$app->activity->getEntity();

        $activity = $activityComponent->getEntity();
        //$tableDb = $activity->tableName(); сохранение через DAO

        if (\Yii::$app->request->isPost) {

            $activity->load(\Yii::$app->request->post());

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($activity);
            }

            if (\Yii::$app->activity->createActivity($activity)) {
                //\Yii::$app->dao->insertActivityIntoDb($activity, $tableDb); сохранение через DAO
                return $this->controller->redirect(['/activity/view', 'id' => $activity->id_fld]);
                //return $this->controller->redirect('/');
                //return $this->controller->render('files', ['model'=>$activity->loadFile]);
            }
        }

        return $this->controller->render('create', ['model' => $activity]);
    }
}