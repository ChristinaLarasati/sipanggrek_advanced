<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritaPosyandu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-posyandu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_unggah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
