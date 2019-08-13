<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;
use yii\filters\PageCache;

class DaoController extends BaseController
{
    public function behaviors() //кеширование страницы
    {
        return [
            ['class'=>PageCache::class,
                'duration' => 10,
                'only' => ['index']]
        ];
    }

    public function actionIndex()
    {
        /** @var DaoComponent $dao */
        $dao = \Yii::$app->dao;

        $users = $dao->getUsers();
        $activities = $dao->getActivityUser(\Yii::$app->request->get('user', 1));
        $act = $dao->getFirstActivity();
        $count = $dao->getCountActivity();

        return $this->render('index', ['users' => $users, 'activities' => $activities]);
    }

    public function actionCache()
    {
        //\Yii::$app->cache->set('tst','value');
        $val = \Yii::$app->cache->get('tst');
        //\Yii::$app->cache->exists()
        $val = \Yii::$app->cache->getOrSet('key1', function () {
            return 'value for cache';
        });
        //\Yii::$app->cache->flush();
        echo $val;
    }

}