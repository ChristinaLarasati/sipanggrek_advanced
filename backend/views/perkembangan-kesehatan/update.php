<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PerkembanganKesehatan */

$this->title = 'Update Perkembangan Kesehatan: ' . $model->id_perkembangan;
$this->params['breadcrumbs'][] = ['label' => 'Perkembangan Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perkembangan, 'url' => ['view', 'id' => $model->id_perkembangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perkembangan-kesehatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
