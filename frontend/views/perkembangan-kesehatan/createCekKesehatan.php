<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PerkembanganKesehatan */

$this->title = 'Create Perkembangan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Perkembangan Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// echo "<pre>"; print_r($modelAnggota->nik); die();
?>
<div class="perkembangan-kesehatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $anggota,
        'attributes' => [
            'nik',
            'nama_anggota',
        ],
    ]) ?>
    

    <?= $this->render('_formCekKesehatan', [
        'model' => $model,
    ]) ?>

</div>
