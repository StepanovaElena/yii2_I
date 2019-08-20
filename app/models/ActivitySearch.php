<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fld', 'userID_fld', 'isBlocked_fld', 'isRepeated_fld', 'useNotification_fld'], 'integer'],
            [['title_fld', 'startDay_fld', 'endDay_fld', 'body_fld', 'repeatType_fld', 'email_fld', 'createAt_fld'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Activity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_fld' => $this->id_fld,
            'startDay_fld' => $this->startDay_fld,
            'endDay_fld' => $this->endDay_fld,
            'userID_fld' => $this->userID_fld,
            'isBlocked_fld' => $this->isBlocked_fld,
            'isRepeated_fld' => $this->isRepeated_fld,
            'useNotification_fld' => $this->useNotification_fld,
            'createAt_fld' => $this->createAt_fld,
        ]);

        $query->andFilterWhere(['like', 'title_fld', $this->title_fld])
            ->andFilterWhere(['like', 'body_fld', $this->body_fld])
            ->andFilterWhere(['like', 'repeatType_fld', $this->repeatType_fld])
            ->andFilterWhere(['like', 'email_fld', $this->email_fld]);

        return $dataProvider;
    }
}
