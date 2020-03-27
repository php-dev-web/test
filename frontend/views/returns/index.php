<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My returns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            'Book name' => [
                'value' => 'books.title',
                'label' => 'Book name',
            ],
            // 'Customer' => [
            //     'value' => 'customers.name',
            //     'label' => 'Customer',
            // ],
            'Staff' => [
                'value' => 'staff.name',
                'label' => 'Staff',
            ],
        ],
    ]); ?>


</div>
