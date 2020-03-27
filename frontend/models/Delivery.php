<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $book_id
 * @property int|null $staff_id
 * @property int|null $customer_id
 * @property string|null $date_start
 * @property string|null $date_end
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'date_start', 'date_end'], 'safe'],
            [['book_id', 'staff_id', 'customer_id'], 'default', 'value' => null],
            [['book_id', 'staff_id', 'customer_id'], 'integer'],
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
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }

    public function getBooks()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }
}
