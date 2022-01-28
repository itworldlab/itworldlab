<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Integrator */

$this->title = 'Update Integrator: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Integrators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="integrator-update card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>

</div>
