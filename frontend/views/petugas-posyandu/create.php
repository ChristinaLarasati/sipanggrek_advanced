<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PetugasPosyandu */

$this->title = 'Create Petugas Posyandu';
$this->params['breadcrumbs'][] = ['label' => 'Petugas Posyandu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-posyandu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
