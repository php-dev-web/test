<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%return}}`.
 */
class m200324_074250_create_return_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%return}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'book_id' => $this->integer()->defaultValue(1),
            'staff_id' => $this->integer()->defaultValue(1),
            'customer_id' => $this->integer()->defaultValue(1),
            'condition' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%return}}');
    }
}
