<?php
$cat = ['/product/view','id'=>$model->id];
if(isset($_GET['category_id'])){
    $cat = ['/product/view','id'=>$model->id,'category_id'=>$_GET['category_id']];
}
?>
<div class="partner-row">
    <div class="partner-row__header">
        <a class="partner-row__name" href="<?=\yii\helpers\Url::to($cat)?>"><?=$model->name?></a>
        <a href="" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt="">Добавить в сравнение</a>
    </div>

    <div class="partner-row__grid partner-row__grid-five" style="padding-left:20px;">
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="partner-grid__logo"><img src="/uploads/<?=$model->logo?>" alt=""></a>
        <div class="partner-grid__column">
            <span class="partner-grid__title">Локация и опыт:</span>
            <ul class="partner-row__list">
                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></li>
                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
            </ul>
        </div>
        <div class="partner-grid__column">
            <?=mb_substr($model->short_descr,0,100)?>
        </div>
        <div class="partner-grid__column">
            <span class="partner-grid__title">Цена:</span>
            <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></span>
            <p class="partner-row__text">Конечную цену узнавайте у интеграторов или вендеров</p>
        </div>
        <div class="partner-grid__column">
            <a href="<?=\yii\helpers\Url::to($cat)?>" class="product__header-compare compareBtn"><img src="/images/dist/sed.svg" alt="">Подробнее</a>
        </div>
    </div>
</div>
