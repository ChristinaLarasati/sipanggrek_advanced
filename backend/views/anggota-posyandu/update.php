<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AnggotaPosyandu */

$this->title = 'Update Anggota Posyandu: ' . $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Posyandus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nik, 'url' => ['view', 'id' => $model->nik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-posyandu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
