<?php

use yii\db\Migration;

/**
 * Class m190728_145648_insertIntoTables
 */
class m190728_145648_insertIntoTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users_tbl', [
            'id_fld' => 1,
            'email_fld' => 'test@test.com',
            'pass_hash_fld' => '123456asdfghjkl'
        ]);

        $this->batchInsert('activity_tbl', ['id_fld','title_fld', 'startDay_fld', 'endDay_fld', 'userID_fld', 'body_fld', 'useNotification_fld', 'email_fld'],
            [
                [1, 'task one', date('Y-m-d'), '2020-01-01', 1, 'important', 0, null],
                [2, 'task two', date('Y-m-d'), '2020-01-01', 1, 'important', 1, 'test@test.com']
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity_tbl');
        $this->delete('users_tbl');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190728_145648_insertIntoTables cannot be reverted.\n";

        return false;
    }
    */
}
