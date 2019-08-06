<?php


namespace app\controllers;


use app\controllers\actions\auth\SignInAction;
use app\controllers\actions\auth\SignUpAction;
use app\models\Users;
use yii\web\Controller;

class AuthController extends Controller
{

    public function actions()
    {
        return [
            'signup'=>[
                'class'=> SignUpAction::class,
                'classEntity'=> Users::class
            ],

            'signin'=>[
                'class'=> SignInAction::class,
                'classEntity'=> Users::class
            ],

        ];
    }
}