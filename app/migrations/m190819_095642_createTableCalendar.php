<?php

use yii\db\Migration;

/**
 * Class m190819_095642_createTableCalendar
 */
class m190819_095642_createTableCalendar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('calendar', [
            'id' => $this->primaryKey()->notNull()->defaultExpression('AUTO_INCREMENT'),
            'date' => 'datetime NOT NULL',
            'val' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('calendar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190819_095642_createTableCalendar cannot be reverted.\n";

        return false;
    }
    */
}
