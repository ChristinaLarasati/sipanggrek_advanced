<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\AnggotaPosyanduSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anggota Posyandu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-posyandu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Anggota Posyandu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nik',
            'nama_anggota',
            [
                'attribute' => 'peran',
                'value' => 'peran',
            ],
            //'tempat_lahir',
            //'tgl_lahir',
            //'gender',
            //'alamat',
            //'nama_ayah',
            //'nama_ibu',
            //'nama_suami',
            //'pekerjaan',
            //'no_hp',
            //'no_hp_orangtua',
            //'tgl_pendaftaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
