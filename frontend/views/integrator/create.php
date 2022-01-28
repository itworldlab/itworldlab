<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Integrator */

$this->title = 'Create Integrator';
$this->params['breadcrumbs'][] = ['label' => 'Integrators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrator-create card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>

</div>
