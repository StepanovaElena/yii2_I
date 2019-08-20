<?php


namespace app\models\search;


use app\models\Activity;
use app\models\Calendar;
use yii\data\ActiveDataProvider;

class CalendarSearch extends Calendar
{
    public function search($params)
    {
        $query = Activity::find()->where(['userID_fld'=>\Yii::$app->user->getId()]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 30],
            'sort'=> ['defaultOrder' => ['start'=>SORT_DESC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->calories,
            'val' => $this->peak_heartrate,
        ]);

        return $dataProvider;
    }
}