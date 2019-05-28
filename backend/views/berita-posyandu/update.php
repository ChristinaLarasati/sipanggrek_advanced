<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaPosyandu */

$this->title = 'Update Berita Posyandu: ' . $model->id_berita;
$this->params['breadcrumbs'][] = ['label' => 'Berita Posyandus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berita, 'url' => ['view', 'id' => $model->id_berita]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-posyandu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
