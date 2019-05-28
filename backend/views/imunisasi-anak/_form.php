<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImunisasiAnak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imunisasi-anak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_imunisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'vaksin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pemberian')->textInput() ?>

    <?= $form->field($model, 'petugas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
