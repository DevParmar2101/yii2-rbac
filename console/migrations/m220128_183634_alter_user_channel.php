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
