<?php

use yii\db\Migration;

/**
 * Class m190728_120718_createTables
 */
class m190728_120718_createTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity_tbl', [
            'id_fld' => $this->primaryKey()->defaultExpression('AUTO_INCREMENT'),
            'title_fld' => $this->string(150)->notNull(),
            'startDay_fld' => $this->date()->notNull(),
            'endDay_fld' => $this->date()->notNull(),
            'userID_fld' => $this->integer()->notNull(),
            'body_fld' => $this->string(455)->notNull(),
            'isBlocked_fld' => $this->tinyInteger()->notNull()->defaultValue(0),
            'isRepeated_fld' => $this->tinyInteger()->notNull()->defaultValue(0),
            'repeatType_fld' => $this->string(25),
            'email_fld' => $this->string(150),
            'useNotification_fld' => $this->tinyInteger()->notNull()->defaultValue(0),
            'createAt_fld' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('users_tbl', [
            'id_fld' => $this->primaryKey()->defaultExpression('AUTO_INCREMENT'),
            'email_fld' => $this->string(150)->notNull(),
            'pass_hash_fld' => $this->string(300)->notNull(),
            'token_fld' => $this->string(150),
            'auth_key' => $this->string(150),
            'createAt_fld' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity_tbl');
        $this->dropTable('users_tbl');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190728_120718_createTables cannot be reverted.\n";

        return false;
    }
    */
}
