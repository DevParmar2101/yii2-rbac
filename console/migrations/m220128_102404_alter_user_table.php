<?php

use yii\db\Migration;

/**
 * Class m220128_102404_alter_user_table
 */
class m220128_102404_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query =<<<EOF

EOF;
        $this->execute($query);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220128_102404_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220128_102404_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
