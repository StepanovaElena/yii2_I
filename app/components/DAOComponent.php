<?php


namespace app\components;


use yii\db\Query;

class DAOComponent
{
    private function getConnection()
    {
        return \Yii::$app->db;
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users_tbl';
        return $this->getConnection()->createCommand($sql)->queryAll();
    }

    public function getActivityUser($user_id)
    {
        $sql = "SELECT * FROM activity_tbl WHERE userID_fld =:user_id";
        return $this->getConnection()->createCommand($sql, ['user_id' => $user_id])->queryAll();
    }

    public function getFirstActivity()
    {
        $query = new Query();
        return $query->from('activity_tbl')
            ->orderBy(['id_fld' => SORT_DESC])
            ->select(['id_fld', 'title_fld'])
            ->andWhere(['useNotification_fld' => 1])
            ->limit(3)
            /*->createCommand()->rawSql; для вывода постороенного запроса*/
            ->one($this->getConnection());
    }

    public function getCountActivity()
    {
        $query = new Query();
        return $query->from('activity_tbl')
            ->select('count(id)')
            ->scalar($this->getConnection());
    }

    public function getActivityReader()
    {
        $query = new Query();
        return $query->from('activity_tbl')->createCommand()->query();
    }

    public function transactionTest()
    {
        $transaction = $this->getConnection()->beginTransaction();
        try {
            $this->getConnection()->createCommand('activity_tbl',
                [
                    'title_fld' => 'task three',
                    'startDay_fld' => date('Y-m-d'),
                    'endDay_fld' => '2020-01-01',
                    'userID_fld' => 1,
                    'body_fld' => 'important'
                ])->execute();
            $transaction->commit();

        } catch (\Exception $e) {
            $transaction->rollBack();
        }

        //$this->getConnection()->transaction(function() {
        //})
    }

    public function insertActivityIntoDb(&$model, $tableDb)
    {
        $this->getConnection()->createCommand()->insert($tableDb, [
            'title_fld' => $model->title_fld,
            'startDay_fld' => $model->startDay_fld,
            'endDay_fld' => $model->endDay_fld,
            'userID_fld' => \Yii::$app->user->getId(),
            'body_fld' => $model->body_fld,
            'isBlocked_fld' => $model->isBlocked_fld,
            'isRepeated_fld' => $model->isRepeated_fld,
            'repeatType_fld' => $model->repeatType_fld,
            'email_fld' => $model->email_fld,
            'useNotification_fld' => $model->useNotification_fld,
            'createAt_fld' => date('Y-m-d H:i:s')])
            ->execute();

        $model->id_fld = $this->getConnection()->lastInsertID;
    }


}