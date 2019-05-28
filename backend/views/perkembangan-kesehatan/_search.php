<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PerkembanganKesehatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perkembangan-kesehatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_perkembangan') ?>

    <?= $form->field($model, 'identitas_anggota') ?>

    <?= $form->field($model, 'lingkar_perut') ?>

    <?= $form->field($model, 'berat_badan') ?>

    <?= $form->field($model, 'tinggi_badan') ?>

    <?php // echo $form->field($model, 'keluhan') ?>

    <?php // echo $form->field($model, 'tgl_pemeriksaan') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
