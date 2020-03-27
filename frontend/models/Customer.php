<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $passport
 *
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'passport'], 'required'],
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['name', 'passport'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'passport' => 'Passport',
            'customerBooks' => 'Customer Books', 
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDelivery()
    {
        return $this->hasMany(Delivery::className(), ['customer_id' => 'id']);
    }

    public function getCustomerBooks()
    {
        $delivery = $this->delivery;
        $str = '';
        foreach ($delivery as $key => $value) {
            $str .= $value->books->title . " " . $value->books->receipt_date . PHP_EOL;
        }
        return $str;
    }

}
