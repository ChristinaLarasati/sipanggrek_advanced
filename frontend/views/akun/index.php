<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\AkunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Akun', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'password',
            'nik_anggota',
            'id_petugas',
            'peran_pengguna',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
