<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\ImunisasiAnakSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imunisasi-anak-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_imunisasi') ?>

    <?= $form->field($model, 'nama_penerima') ?>

    <?= $form->field($model, 'usia') ?>

    <?= $form->field($model, 'vaksin') ?>

    <?= $form->field($model, 'tgl_pemberian') ?>

    <?php // echo $form->field($model, 'petugas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
