<?php

use yii\db\Migration;

/**
 * Class m190728_141251_alterTables
 */
class m190728_141251_alterTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('ActivityUser_fk', 'activity_tbl', 'userID_fld', 'users_tbl', 'id_fld','CASCADE', 'CASCADE');
        $this->createIndex('EmailUser_ind','users_tbl', 'email_fld', 'true');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ActivityUser_fk', 'activity_tbl');
        $this->dropIndex('EmailUser_ind', 'users_tbl');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190728_141251_alterTables cannot be reverted.\n";

        return false;
    }
    */
}
