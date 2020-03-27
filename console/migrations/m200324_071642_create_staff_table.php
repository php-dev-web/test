<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 */
class m200324_071642_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger(20)->notNull(),
            'name' => $this->string()->notNull(),
            'position' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'staff_id',  
            'staff', 
            'user_id',
            'user', 
            'id', 
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%staff}}');

        $this->dropForeignKey(
            'staff_id',
            'staff'
        );
    }
}
