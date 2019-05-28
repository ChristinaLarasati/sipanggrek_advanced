<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PerkembanganKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perkembangan Kesehatan';
$this->params['breadcrumbs'][] = $this->title;

$a = array();
$c = array();
foreach($data as $d){
    $a[] = $d->tinggi_badan;
    $c[] = $d->berat_badan;
}

?>
<div class="perkembangan-kesehatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perkembangan Kesehatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_perkembangan',
            'identitas_anggota',
            //'lingkar_perut',
            //'berat_badan',
            //'tinggi_badan',
            'keluhan',
            //'tgl_pemeriksaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 150,
        'width' => 300
    ],
    'data' => [
        'labels' => ["Kunjungan I", "Kunjungan II", "Kunjungan III", "Kunjungan IV", "Kunjungan V", "Kunjungan VI", "Kunjungan VII", 
        "Kunjungan VIII", "Kunjungan IX", "Kunjungan X", "Kunjungan XI", "Kunjungan XII"],
        'datasets' => [
            [
                'label' => "Berat Badan",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => $c
            ],
            [
                'label' => "Tinggi Badan",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => $a
            ]
        ]
    ]
]);
?>


</div>
