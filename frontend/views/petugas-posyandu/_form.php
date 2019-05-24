<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Role;

/* @var $this yii\web\View */
/* @var $model frontend\models\PetugasPosyandu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="petugas-posyandu-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nik_petugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_petugas')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'peran_petugas')->dropDownList(
        ArrayHelper::map(Role::find()->all(), 'id_role', 'nama_role'),
        ['prompt' => 'Select role']
    ) ?>

    <?= $form->field($model, 'no_hp_petugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_daftar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
