<?php


namespace app\controllers\actions\auth;


use yii\base\Action;

class SignUpAction extends Action
{
    public $classEntity;

    public function run()
    {
        $userComponent = \Yii::createObject(['class' => \app\components\AuthComponent::class, 'classEntity' => \app\models\Users::class]);
        $user = $userComponent->getEntity();

        if (\Yii::$app->request->isPost) {
            $user->load(\Yii::$app->request->post());
            $user->scenarioSignup();
            if (\Yii::$app->auth->signUp($user)) {
                return $this->controller->redirect(['/auth/signin','id'=>$user->id_fld]);
            }
        }
        return $this->controller->render('signup', ['model' => $user]);
    }
}