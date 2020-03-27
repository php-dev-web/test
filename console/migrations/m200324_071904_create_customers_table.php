<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers}}`.
 */
class m200324_071904_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customers}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger(20)->notNull(),
            'name' => $this->string()->notNull(),
            'passport' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'customer_id', 
            'customers',
            'user_id', 
            'user', 
            'id', 
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customers}}');

        $this->dropForeignKey(
            'customer_id',
            'customers'
        );
    }
}
