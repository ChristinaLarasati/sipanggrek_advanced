<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vaksin */

$this->title = 'Update Vaksin: ' . $model->id_vaksin;
$this->params['breadcrumbs'][] = ['label' => 'Vaksins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vaksin, 'url' => ['view', 'id' => $model->id_vaksin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vaksin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
