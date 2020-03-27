<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    public $customerName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [ 
            [['id'], 'integer'],
            [['title', 'article', 'receipt_date', 'author', 'availability', 'customerName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find();

        // add conditions that should always apply here
        // $query->joinWith(['delivery']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['delivery'] = [
            'asc' => ['tbl_delivery.book_id' => SORT_ASC],
            'desc' => ['tbl_delivery.book_id' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'receipt_date' => $this->receipt_date,
        ]);

        $query->joinWith(['delivery' => function ($qq) {
            $qq->joinWith(['customer' => function ($q) {
                $q->andFilterWhere(['like', 'name', $this->customerName]); 
            }]);
        }]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'article', $this->article])
            ->andFilterWhere(['ilike', 'author', $this->author])
            ->andFilterWhere(['ilike', 'availability', $this->availability]);

        return $dataProvider;
    }
}
