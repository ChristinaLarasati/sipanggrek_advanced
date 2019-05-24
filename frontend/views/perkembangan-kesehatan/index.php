<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PerkembanganKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perkembangan Kesehatan';
$this->params['breadcrumbs'][] = $this->title;
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
            //'pemeriksa',

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
        'labels' => ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                    "September", "Oktober", "November", "Desember"],
        'datasets' => [
            [
                'label' => "Berat Badan",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [10,12,15,17,19,23,25,27,29,31,35,36]
            ],
            [
                'label' => "Tinggi Badan",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [7,9,11,12,13,15,16,18,21,22,22,25]
            ]
        ]
    ]
]);
?>


</div>
