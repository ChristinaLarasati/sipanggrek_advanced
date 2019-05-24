<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ImunisasiAnakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imunisasi Anak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imunisasi-anak-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Imunisasi Anak', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_imunisasi',
            'nama_penerima',
            'usia',
            'vaksin',
            'tgl_pemberian',
            //'petugas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
