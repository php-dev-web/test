<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "return".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $book_id
 * @property int|null $staff_id
 * @property int|null $customer_id
 * @property string $condition
 */
class Returns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'return';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['book_id', 'staff_id', 'customer_id'], 'default', 'value' => null],
            [['book_id', 'staff_id', 'customer_id'], 'integer'],
            [['condition'], 'required'],
            [['condition'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'book_id' => 'Book ID',
            'staff_id' => 'Staff ID',
            'customer_id' => 'Customer ID',
            'condition' => 'Condition',
        ];
    }

    public function getBooks()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    public function getCustomers()
    {
        return $this->hasOne(Customer::className(), ['user_id' => 'customer_id']);
    }

    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['user_id' => 'staff_id']);
    }
}
