<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerkembanganKesehatan */

// $this->title = $model->id_perkembangan;
$this->params['breadcrumbs'][] = ['label' => 'Perkembangan Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perkembangan-kesehatan-perkembangankesehatan">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_perkembangan',
            'identitas_anggota',
            'lingkar_perut',
            'berat_badan',
            'tinggi_badan',
            'keluhan',
            'tgl_pemeriksaan',
            'pemeriksa',
        ],
    ]) ?>

</div>
