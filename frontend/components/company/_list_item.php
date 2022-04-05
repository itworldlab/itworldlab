<?php
$cat = ['/company/view','id'=>$model->id];
if(isset($_GET['category_id'])){
    $cat = ['/company/view','id'=>$model->id,'category_id'=>$_GET['category_id']];
}
?>

<div class="partner-row">
    <div class="partner-row__header">
        <div class="partner-row__name"><?=$model->name?></div>
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt=""><?=Yii::t("product","add_compare")?></a>
    </div>

    <div class="partner-row__grid partner-row__grid-five">
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="partner-grid__logo"><img src="/uploads/<?=$model->logo_image?>" alt=""></a>
        <div class="partner-grid__column">
            <span class="partner-grid__title"><?=Yii::t("integrator","location_and_portfolio")?>:</span>
            <ul class="partner-row__list">
                <li class="partner-row__list-location"><?=Yii::t("integrator","location")?>: <?=$model->region->name?> <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                <li class="partner-row__list-open"><?=Yii::t("integrator","opened_at")?>: <?=$model->open_date?> г.</li>
                <li class="partner-row__list-open"><?=Yii::t("integrator","in_site")?>: 2022 г.</li>
            </ul>
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
                    <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: <?=$model->average_rate?></span>
                </li>
                <li>
                    <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: <?=$model->projects_count?></span>
                </li>

            </ul>
        </div>
        <!--<div class="partner-grid__column">
            <span class="partner-grid__title">Интегрируемое ПО: (6)</span>
            <ul class="integrable-po">
                <li class="integrable-po__item"><img src="/images/dist/bitrix-24.png" alt="" class="integrable-po__img">Битрикс24</li>
                <li class="integrable-po__item"><img class="integrable-po__img" src="/images/dist/1C_Company_logo.jpg" alt="">1с - Бухгалтерия</li>
                <li class="integrable-po__item"><img src="/images/dist/SAP.png" class="integrable-po__img" alt="">SAP</li>
            </ul>
        </div>-->
        <div class="partner-grid__column">
            <span class="price">* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
            <p class="partner-row__text"><?=Yii::t("integrator","last_price")?></p>
            <a href="<?=\yii\helpers\Url::to($cat)?>" class="product__header-compare compareBtn"><img src="/images/dist/sed.svg" alt=""><?=Yii::t("index","more")?></a>
        </div>
    </div>
    <!-- /.partner-row__grid -->
</div>
