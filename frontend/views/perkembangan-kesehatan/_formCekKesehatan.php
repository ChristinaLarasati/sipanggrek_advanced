<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\PerkembanganKesehatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perkembangan-kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lingkar_perut')->textInput() ?>

    <?= $form->field($model, 'berat_badan')->textInput() ?>

    <?= $form->field($model, 'tinggi_badan')->textInput() ?>

    <?= $form->field($model, 'keluhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pemeriksaan')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
         // modify template for custom rendering
         //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
         'clientOptions' => [
             'autoclose' => true,
             'format' => 'yyyy-mm-dd'
             ]
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
