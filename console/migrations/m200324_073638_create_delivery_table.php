<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery}}`.
 */
class m200324_073638_create_delivery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%delivery}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'book_id' => $this->integer()->defaultValue(1),
            'staff_id' => $this->integer()->defaultValue(1),
            'customer_id' => $this->integer()->defaultValue(1),
            'date_start' => $this->dateTime(),
            'date_end' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%delivery}}');
    }
}
