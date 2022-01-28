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
        $this->createTable('{{%user_channel}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_channel}}');
    }
}
