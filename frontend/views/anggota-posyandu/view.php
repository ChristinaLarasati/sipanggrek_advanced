<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPosyandu */

$this->title = $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Posyandu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anggota-posyandu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nik], [
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
            'nik',
            'nama_anggota',
            'peran',
            'tempat_lahir',
            'tgl_lahir',
            'gender',
            'alamat',
            'nama_ayah',
            'nama_ibu',
            'nama_suami',
            'pekerjaan',
            'no_hp',
            'no_hp_orangtua',
            'foto_anggota',
            'tgl_pendaftaran',
        ],
    ]) ?>

</div>
