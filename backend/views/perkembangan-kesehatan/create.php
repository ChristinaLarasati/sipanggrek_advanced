<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PerkembanganKesehatan */

$this->title = 'Create Perkembangan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Perkembangan Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perkembangan-kesehatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
