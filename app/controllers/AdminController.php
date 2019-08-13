<?php


namespace app\controllers;


use app\base\BaseController;
use yii\base\Controller;

class AdminController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('views');
    }
}