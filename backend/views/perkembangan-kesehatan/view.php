<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerkembanganKesehatan */

$this->title = $model->id_perkembangan;
$this->params['breadcrumbs'][] = ['label' => 'Perkembangan Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perkembangan-kesehatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_perkembangan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_perkembangan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
        
        ],
    ]) ?>

</div>
