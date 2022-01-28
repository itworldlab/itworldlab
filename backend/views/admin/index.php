<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'name',
            'auth_key',
            'password_hash',
            //'password_reset_token',
            //'email:email',
            //'verification_token',
            //'phone',
            //'cat',
            //'avatar_image',
            //'status',
            //'created_at',
            //'updated_at',
            //'blocked_at',
            //'blocked_id',
            //'login_at',
            //'login_ip',
            //'access_token',
            //'created_ip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
