<?php


namespace app\controllers\actions\auth;


use app\models\Users;
use Yii;
use yii\base\Action;

class SignInAction extends Action
{
    public $classEntity;

    public function run()
    {
        $userComponent = \Yii::createObject(['class' => \app\components\AuthComponent::class, 'classEntity' => \app\models\Users::class]);
        $user = $userComponent->getEntity();

        if (\Yii::$app->request->isPost) {
            $user->load(\Yii::$app->request->post());
            $user->scenarioSingin();
            if (\Yii::$app->auth->signIn($user)) {
                if (Yii::$app->rbac->isUserAdmin()) {
                    return $this->controller->redirect('/admin/default/index');
                }

                return $this->controller->redirect('/day/show');
            }
        }
        return $this->controller->render('signin', ['model' => $user]);
    }

}