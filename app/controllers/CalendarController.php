<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\search\CalendarSearch;

class CalendarController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new CalendarSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}