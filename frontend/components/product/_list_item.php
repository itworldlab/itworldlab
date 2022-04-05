<?php
$cat = ['/product/view','id'=>$model->id];
if(isset($_GET['category_id'])){
    $cat = ['/product/view','id'=>$model->id,'category_id'=>$_GET['category_id']];
}
?>
<div class="partner-row">
    <div class="partner-row__header">
        <div class="partner-row__name"><?=$model->name?></div>
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt="<?=$model->name?>"><?=Yii::t("product","add_compare")?></a>
    </div>
    <div class="partner-row__grid partner-row__grid-four">
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="partner-grid__logo"><img src="/uploads/<?=$model->logo?>" alt="<?=$model->name?>"></a>

        <div class="partner-grid__column">
            <span class="partner-grid__title"><?=Yii::t("product","descr")?>:</span>
            <div class="partner-grid__descript">
                <?=$model->short_descr?>
            </div>
        </div>

        <div class="partner-grid__column">
            <span class="partner-grid__title"><?=Yii::t("product","reviews_and_rate")?>:</span>
            <ul class="info-row info-row--vertical">
                <li>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </li>
                <li>
                    <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: 0</span>
                </li>
                <li>
                    <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: 0</span>
                </li>

            </ul>
        </div>

        <div class="partner-grid__column">
            <span class="price"> * <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
            <p class="partner-row__text"><?=Yii::t("product","get_price")?></p>
            <a href="<?=\yii\helpers\Url::to($cat)?>" class="product__header-compare compareBtn"><img src="/images/dist/sed.svg" alt=""><?=Yii::t("index","more")?></a>
        </div>
    </div>
</div>
