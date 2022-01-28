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
ALTER TABLE `user` ADD `first_name` VARCHAR(125) NOT NULL AFTER `verification_token`, ADD `last_name` VARCHAR(125) NOT NULL AFTER `first_name`, ADD `dob` VARCHAR(125) NOT NULL AFTER `last_name`; 

ALTER TABLE `user` ADD `dob` TIMESTAMP NOT NULL AFTER `last_name`; 
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
