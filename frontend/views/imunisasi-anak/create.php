<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImunisasiAnak */

$this->title = 'Create Imunisasi Anak';
$this->params['breadcrumbs'][] = ['label' => 'Imunisasi Anaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imunisasi-anak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
