<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
     \yii\helpers\ArrayHelper::map(\app\models\Customer::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'date_start')->widget(DatePicker::classname()) ?>

    <?= $form->field($model, 'date_end')->widget(DatePicker::classname()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
