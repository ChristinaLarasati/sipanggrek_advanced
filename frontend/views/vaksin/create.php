<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vaksin */

$this->title = 'Create Vaksin';
$this->params['breadcrumbs'][] = ['label' => 'Vaksins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaksin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
