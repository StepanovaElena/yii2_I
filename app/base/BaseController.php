<?php


namespace app\base;


use yii\web\Controller;

class BaseController extends Controller
{

    public function beforeAction($action)
    {
        $session = \Yii::$app->session;
        $session->set('previous_url', \Yii::$app->request->referrer);
        $session->set('current_url', \Yii::$app->request->getAbsoluteUrl());

        return parent::beforeAction($action);
    }

}