<?php

use yii\db\Migration;

/**
 * Class m220127_084821_alter_user
 */
class m220127_084821_alter_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query =<<<EOF
ALTER TABLE `user` ADD `role` VARCHAR(55) NULL DEFAULT NULL AFTER `username`; 
EOF;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220127_084821_alter_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220127_084821_alter_user cannot be reverted.\n";

        return false;
    }
    */
}
