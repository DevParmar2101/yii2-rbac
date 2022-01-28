<?php

use yii\db\Migration;

/**
 * Class m220128_120423_create_contact_form
 */
class m220128_120423_create_contact_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query=<<<EOF
CREATE TABLE `contact_form` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(125) NOT NULL,
 `email` varchar(125) NOT NULL,
 `subject` varchar(125) NOT NULL,
 `body` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
EOF;
        $this->execute($query);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220128_120423_create_contact_form cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220128_120423_create_contact_form cannot be reverted.\n";

        return false;
    }
    */
}
