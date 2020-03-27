<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Book;
use app\models\Delivery;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'article',
            'receipt_date',
            'author',
            'customerName',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}{delivery}',
                'buttons' => [
                    'delivery' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-open-file"></span>', $url, [
                                    'title' => Yii::t('app', 'delivery'),
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
