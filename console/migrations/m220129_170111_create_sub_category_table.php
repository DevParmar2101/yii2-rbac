<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sub_category}}`.
 */
class m220129_170111_create_sub_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sub_category}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sub_category}}');
    }
}
