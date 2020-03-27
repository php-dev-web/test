<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;
/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $article
 * @property string|null $receipt_date
 * @property string $author
 * @property string $availability
 */
class Book extends \yii\db\ActiveRecord
{

    public $date;
    public $customer_id;
    public $date_start;
    public $date_end;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'article', 'author', 'availability'], 'required'],
            [['receipt_date'], 'safe'],
            [['title', 'article', 'author', 'availability'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'article' => 'Article',
            'customer_id' => 'Customer',
            'receipt_date' => 'Receipt Date',
            'author' => 'Author',
            'availability' => 'Availability',
            'customerName' => 'Customer Name',
        ];
    }

    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['book_id' => 'id']);
    }

    public function getCustomerName()
    {
        return $this->delivery->customer->name;
    }
}
