<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImunisasiAnak */

$this->title = 'Update Imunisasi Anak: ' . $model->id_imunisasi;
$this->params['breadcrumbs'][] = ['label' => 'Imunisasi Anaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_imunisasi, 'url' => ['view', 'id' => $model->id_imunisasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imunisasi-anak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
