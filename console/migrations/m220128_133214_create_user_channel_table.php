<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_channel}}`.
 */
class m220128_133214_create_user_channel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query =<<<EOF
CREATE TABLE `user_channel` (
 `channel_id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `channel_name` varchar(225) NOT NULL,
 `channel_category` smallint(4) NOT NULL,
 `channel_sub_category` smallint(4) NOT NULL,
 `channel_bio` text NOT NULL,
 PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
EOF;
        $this->execute($query);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_channel}}');
    }
}
