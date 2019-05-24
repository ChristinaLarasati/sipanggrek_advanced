<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PerkembanganKesehatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perkembangan-kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_perkembangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identitas_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lingkar_perut')->textInput() ?>

    <?= $form->field($model, 'berat_badan')->textInput() ?>

    <?= $form->field($model, 'tinggi_badan')->textInput() ?>

    <?= $form->field($model, 'keluhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pemeriksaan')->textInput() ?>

    <?= $form->field($model, 'pemeriksa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
