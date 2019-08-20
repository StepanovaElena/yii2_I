<?php


namespace app\modules\admin\controllers;


use app\models\Users;

class UserController extends AdminController
{
    public function actionIndex()
    {
        $users = Users::find()->asArray()->all();

        return $this->render('index', ['model' => $users]);
    }

    public function actionAdd()
    {
        $userComponent = \Yii::createObject(['class' => \app\components\AuthComponent::class, 'classEntity' => \app\models\Users::class]);
        $user = $userComponent->getEntity();

        if (\Yii::$app->request->isPost) {

            $user->load(\Yii::$app->request->post());

            if (\Yii::$app->auth->signUp($user)) {
                return $this->redirect('/admin/user/index');
            }
        }

        return $this->render('add', ['model' => $user]);
    }
}