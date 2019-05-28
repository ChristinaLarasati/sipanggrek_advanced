<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AnggotaPosyanduSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-posyandu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama_anggota') ?>

    <?= $form->field($model, 'peran') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'nama_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'nama_suami') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'no_hp_orangtua') ?>

    <?php // echo $form->field($model, 'tgl_pendaftaran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
