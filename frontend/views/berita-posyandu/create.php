<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritaPosyandu */

$this->title = 'Create Berita Posyandu';
$this->params['breadcrumbs'][] = ['label' => 'Berita Posyandus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-posyandu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
