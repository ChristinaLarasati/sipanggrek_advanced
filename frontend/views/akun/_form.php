<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Role;

/* @var $this yii\web\View */
/* @var $model frontend\models\Akun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="akun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_petugas')->textInput(['maxlength' => true]) ?>
                    
    <?= $form->field($model, 'peran_pengguna')->dropDownList(
        ArrayHelper::map(Role::find()->all(), 'id_role', 'nama_role'),
        ['prompt' => 'Select role']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>