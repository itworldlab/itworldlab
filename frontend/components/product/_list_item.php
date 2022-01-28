<?php
$cat = ['/product/view','id'=>$model->id];
if(isset($_GET['category_id'])){
    $cat = ['/product/view','id'=>$model->id,'category_id'=>$_GET['category_id']];
}
?>
<div class="catalog__table-row">
    <div class="catalog__table-logo">
        <img src="/uploads/<?=$model->logo?>" alt="" style="max-width:150px;">
        <span class="price catalog__table-mobile">от 250 000 Т* <svg class="price__faq"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></span>
    </div>

    <div class="catalog__table-descript">
        <strong class="h3 catalog__table-name"><?=$model->name?></strong>
        <p class="catalog__table-text"><?=$model->short_descr?></p>
    </div>
    <div class="catalog__table-raiting">
        <ul class="stars">
            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="images/dist/sprite.svg#star"></use></svg></a></li>
            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="images/dist/sprite.svg#star"></use></svg></a></li>
            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="images/dist/sprite.svg#star"></use></svg></a></li>
            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="images/dist/sprite.svg#star"></use></svg></a></li>
            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="images/dist/sprite.svg#star-black"></use></svg></a></li>
        </ul>
        <ul class="box__gray">
            <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
            <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
        </ul>
    </div>
    <div class="catalog__table-price">
        <span class="price catalog__table-hiddenMobile">от 250 000 Т*</span>
        <a href="<?=\yii\helpers\Url::to($cat)?>" class="compare catalog__table-compare">Подробнее <svg class="compare__icon"><use xlink:href="images/dist/sprite.svg#exchange"></use></svg></a>
    </div>
</div>
