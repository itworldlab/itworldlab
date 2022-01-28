<?php
$cat = ['/product/view','id'=>$model->id];
if(isset($_GET['category_id'])){
    $cat = ['/product/view','id'=>$model->id,'category_id'=>$_GET['category_id']];
}
?>
<a href="<?=\yii\helpers\Url::to($cat)?>" class="box-row" style="margin-bottom: 10px;margin-top:10px;">
    <img src="/uploads/<?=$model->logo?>" class="box-row__logo" alt="">
    <div class="box-row__info">
        <strong class="box-row__name"><?=$model->name?></strong>
        <ul class="stars">
            <li class="stars__item"><span class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></span></li>
            <li class="stars__item"><span class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></span></li>
            <li class="stars__item"><span class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></span></li>
            <li class="stars__item"><span class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></span></li>
            <li class="stars__item"><span class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></span></li>
        </ul>
        <span class="box-row__grey"><?=Yii::t("product","uses")?>: 1 231</span>
    </div>
    <div class="box-row__descript">
        <?=$model->short_descr?>
    </div>
    <div class="box-row__right">
        <button onclick="alert('asd');" type="button" class="btn btn-outline-primary compare"><?=Yii::t('product','add_compare')?> <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></button>
        <span class="box-row__price"><?=Yii::t('product','by')?> 250 000 Т*</span>
    </div>
</a>
