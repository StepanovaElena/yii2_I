<?php

use yii\db\Migration;

/**
 * Class m190801_105528_insertIntoTable
 */
class m190801_105528_insertIntoTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('users_tbl', [
            'id_fld' => 2,
            'email_fld' => 'admin@mail.ru',
            'pass_hash_fld' => \Yii::$app->security->generatePasswordHash(123456),
            'auth_key' => \Yii::$app->security->generateRandomString()
        ]);
    }

        /**
         * {@inheritdoc}
         */
        public function safeDown()
    {
        $this->delete('users_tbl');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190801_105528_insertIntoTable cannot be reverted.\n";

        return false;
    }
    */
}
