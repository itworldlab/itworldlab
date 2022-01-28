<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Prop */

$this->title = 'Update Prop: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Props', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prop-update card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>

</div>
