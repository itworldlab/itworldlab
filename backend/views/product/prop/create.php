<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Prop */

$this->title = 'Create Prop';
$this->params['breadcrumbs'][] = ['label' => 'Props', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prop-create card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>

</div>
