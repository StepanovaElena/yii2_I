<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DAOController extends BaseController
{
    public function actionIndex(){
        /** @var DAOComponent $dao */
        $dao = \Yii::$app->dao;

        $users = $dao->getUsers();
        $activities = $dao->getActivityUser(\Yii::$app->request->get('user', 1));
        $act = $dao->getFirstActivity();
        $count = $dao->getCountActivity();

        return $this->render('index', ['users' => $users, 'activities'=>$activities]);
    }
}