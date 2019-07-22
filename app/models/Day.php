<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $activity;

    public $type;

    public function getActivity() {
        return $this->activity;
    }

}