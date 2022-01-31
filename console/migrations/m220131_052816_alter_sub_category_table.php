<?php

use yii\db\Migration;

/**
 * Class m220131_052816_alter_sub_category_table
 */
class m220131_052816_alter_sub_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220131_052816_alter_sub_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220131_052816_alter_sub_category_table cannot be reverted.\n";

        return false;
    }
    */
}
