<?php

use yii\db\Migration;

/**
 * Class m220128_183634_alter_user_channel
 */
class m220128_183634_alter_user_channel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query =<<<EOF
ALTER TABLE `user_channel` ADD UNIQUE(`channel_name`); 
ALTER TABLE `user_channel` ADD `channel_profile` VARCHAR(225) NOT NULL AFTER `channel_bio`, ADD `status` SMALLINT(2) NOT NULL AFTER `channel_profile`; 
ALTER TABLE `user_channel` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
ALTER TABLE `user_channel` ADD `created_at` TIMESTAMP NOT NULL AFTER `status`; 
ALTER TABLE `user_channel` ADD `channel_banner` VARCHAR(125) NOT NULL AFTER `channel_profile`;
EOF;
    $this->execute($query);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220128_183634_alter_user_channel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220128_183634_alter_user_channel cannot be reverted.\n";

        return false;
    }
    */
}
