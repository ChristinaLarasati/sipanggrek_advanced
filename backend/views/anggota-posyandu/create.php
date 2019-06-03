<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPosyandu */

$this->title = 'Create Anggota Posyandu';
$this->params['breadcrumbs'][] = ['label' => 'Anggota Posyandus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-posyandu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
