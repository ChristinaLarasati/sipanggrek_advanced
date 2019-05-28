<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PetugasPosyanduSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="petugas-posyandu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nik_petugas') ?>

    <?= $form->field($model, 'nama_petugas') ?>

    <?= $form->field($model, 'peran_petugas') ?>

    <?= $form->field($model, 'no_hp_petugas') ?>

    <?php // echo $form->field($model, 'tgl_daftar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
