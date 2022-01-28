<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('product','menu_title');
$this->params['breadcrumbs'][] = $this->title;

$plat = \backend\models\product\PropType::findOne(['type'=>'platforms']);
$company_type = \backend\models\product\PropType::findOne(['type'=>'company_type']);
$pay_type = \backend\models\product\PropType::findOne(['type'=>'pay_type']);
$deploy = \backend\models\product\PropType::findOne(['type'=>'deploy']);
$cats = \backend\models\product\ProductCategory::find()->all();


?>
<div class="container">
    <div class="catalog">
        <?php
        $form = \yii\bootstrap4\ActiveForm::begin();
        ?>
        <div class="select-filtr">
            <div class="selectBox">
                <span class="selectBox__name">Категория</span>
                <select class="js-select-placeholder">
                    <option></option>
                    <?php foreach($cats as $cat){
                        echo "<option value='".$cat->id."'>".$cat->name."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="selectBox">
                <span class="selectBox__name"><?=$plat->name?></span>
                <select class="js-select-placeholder">
                    <option></option>
                    <?php foreach($plat->props as $prop){
                      echo "<option value='".$prop->id."'>".$prop->name."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="selectBox">
                <span class="selectBox__name"><?=$company_type->name?></span>
                <select class="js-select-placeholder">
                    <option></option>
                    <?php foreach($company_type->props as $prop){
                        echo "<option value='".$prop->id."'>".$prop->name."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="selectBox">
                <span class="selectBox__name"><?=$pay_type->name?></span>
                <select class="js-select-placeholder">
                    <option></option>
                    <?php foreach($pay_type->props as $prop){
                        echo "<option value='".$prop->id."'>".$prop->name."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="selectBox">
                <span class="selectBox__name"><?=$deploy->name?></span>
                <select class="js-select-placeholder">
                    <option></option>
                    <?php foreach($deploy->props as $prop){
                        echo "<option value='".$prop->id."'>".$prop->name."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php \yii\bootstrap4\ActiveForm::end()?>

        <div class="catalog__table">
            <div class="catalog__table-header">
                <span>Результатов:&nbsp; <span class="text-muted"><?=$productsDataProvider->count?></span> </span>
                <span>Наименование <svg class="catalog__table-icon"><use xlink:href="/images/dist/sprite.svg#sort"></use></svg></span>
                <span>Рейтинг <svg class="catalog__table-icon"><use xlink:href="/images/dist/sprite.svg#sort"></use></svg></span>
            </div>
            <!-- /.catalog__table-header -->
            <?php
            echo \yii\widgets\ListView::widget([
                'dataProvider' => $productsDataProvider,
                'itemView' => '@frontend/components/product/_list_item',
                'summary' => false,
            ]);
            ?>
        </div>
        <!-- /.catalog__table -->
    </div>
    <!-- /.catalog -->
</div>
<script>
    document.addEventListener("DOMContentLoaded",function(){
       // $(".select2-selection__clear").hide();
    });
</script>