<?php

use yii\db\Migration;

/**
 * Class m190801_080252_updateTable
 */
class m190801_080252_updateTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('users_tbl',
            ['pass_hash_fld' => \Yii::$app->security->generatePasswordHash(123456)],
            ['id_fld' => 1]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190801_080252_updateTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190801_080252_updateTable cannot be reverted.\n";

        return false;
    }
    */
}
