<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m200324_071013_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'article' => $this->string()->notNull(),
            'receipt_date' => $this->dateTime(),
            'author' => $this->string()->notNull(),
            'availability' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
