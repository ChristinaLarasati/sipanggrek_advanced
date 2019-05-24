<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PetugasPosyanduSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petugas Posyandu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-posyandu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Petugas Posyandu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nik_petugas',
            'nama_petugas',
            'peran_petugas',
            'no_hp_petugas',
            'foto_petugas',
            'tgl_daftar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
