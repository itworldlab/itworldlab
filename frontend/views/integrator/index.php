<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Integrator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'projects_count',
            'average_rate',
            'open_date',
            //'short_descr',
            //'descr:ntext',
            //'addr',
            //'created_at',
            //'created_id',
            //'updated_at',
            //'updated_id',
            //'blocked_at',
            //'blocked_id',
            //'last_activity',
            //'logo_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
