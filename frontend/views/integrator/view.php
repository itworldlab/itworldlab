<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Integrator */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Integrators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="integrator-view card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>
        </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                    'id',
            'name',
            'projects_count',
            'average_rate',
            'open_date',
            'short_descr',
            'descr:ntext',
            'addr',
            'created_at',
            'created_id',
            'updated_at',
            'updated_id',
            'blocked_at',
            'blocked_id',
            'last_activity',
            'logo_image',
        ],
        ]) ?>
    </div>

</div>
