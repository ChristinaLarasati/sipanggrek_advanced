<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PetugasPosyandu */

$this->title = 'Update Petugas Posyandu: ' . $model->nik_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Petugas Posyandus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nik_petugas, 'url' => ['view', 'id' => $model->nik_petugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="petugas-posyandu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
