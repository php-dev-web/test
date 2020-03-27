<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'Staff Name' => [
                'label' => 'Staff Name',
                'value' => 'delivery.staff.name'
            ],
            [
            	'class' => 'yii\grid\ActionColumn',
            	'template' => '{return}',
            	'buttons' => [
                    'return' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-open-file"></span>', $url, [
                                    'title' => Yii::t('app', 'return'),
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
