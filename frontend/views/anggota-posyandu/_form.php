<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Role;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPosyandu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-posyandu-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'peran')->dropDownList(
        ArrayHelper::map(Role::find()->all(), 'id_role', 'nama_role'),
        ['prompt' => 'Pilih peran']
    ) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(
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

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_suami')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_orangtua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pendaftaran')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
