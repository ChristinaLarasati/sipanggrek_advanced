<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaPosyandu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-posyandu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_unggah')->widget(
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
