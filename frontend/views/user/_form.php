<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'role')->dropDownList([
            40 => 'Stuff',
            30 => 'Customer',
        ],
        [
        'onchange' => '
            let user_role = $("#users-role").val();
            if(user_role == "stuff") {
                $("#attr").text("Position");
            } else if (user_role == "customer") {
                $("#attr").text("Passport number");
            }
        '
    ]
    );

    ?>

    <?= $form->field($model, 'attr')->textInput(['maxlength' => true])->label('Position', ['id'=>'attr']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
