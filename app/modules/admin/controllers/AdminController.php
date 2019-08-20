<?php


namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}