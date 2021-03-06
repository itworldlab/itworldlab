<div class="container">
    <ul class="breadcrumbs">
        <li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link"><?=Yii::t("product","index")?></a></li>
        <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link"><?=$model->category->name?></a></li>
        <li class="breadcrumbs__item"><?=$model->name?></li>
    </ul>

    <div class="services-page">
        <img src="/images/dist/services-img.jpg" class="services-page__img" alt="">
        <div class="servicesBox">
            <div class="servicesBox__header">
                <div class="servicesBox__logo"><img src="/images/dist/it-logo.png" alt=""></div>
                <div class="servicesBox__descript">
                    <div class="servicesBox__name"><?=$model->name?></div>
                    <div class="product__header-row">
                        <ul class="stars">
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                        </ul>
                        <div class="info-row product__header-info-row">
                            <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: <?=$model->average_rate?></span>
                            <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: <?=$model->projects_count?></span>
                            <a href="" class="info-row__link"><?=Yii::t("product","send_review")?></a>
                        </div>
                    </div>
                </div>
                <a href="" class="blueBtn servicesBox__blueBtn"><?=Yii::t("integrator","get_consult")?></a>
            </div>
        </div>
        <div class="info-list">
            <div class="info-list__title"><?=Yii::t("integrator","addr")?>:</div>
            <div class="info-list__descript"><address class="address"><svg class="address__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg><?=$model->addr?></address></div>
            <div class="info-list__title"><?=Yii::t("integrator","work_in")?>:</div>
            <div class="info-list__descript">
                <?php
                foreach($model->regions as $region){
                    echo $region->name." ,";
                }
                ?>
            </div>
            <div class="info-list__company">
                <?=$model->descr?>
            </div>
        </div>
    </div>
    <!-- /.services-page -->

    <section class="accordeon-section">
        <h2 class="h2"><?=Yii::t("product","integrate_soft")?>:</h2>
        <span class="accordeon-section__subtitle"></span>

        <div class="wrap-box-dropdown">
            <?php echo count($model->products);?>
            <?php foreach($model->products as $product):?>
            <div class="box-dropdown">
                <div class="box-dropdown__header">
                    <div class="box-dropdown__header-logos">
                        <img src="/uploads/<?=$product->product->logo?>" class="box-dropdown__header-bitriks" alt="">
                        <span class="box-dropdown__logo"><?=$product->product->name?></span>
                    </div>
                    <div class="box-dropdown__header-center">
                        <span class="box-dropdown__header-small"><?=Yii::t("integrator","partner_status")?>:</span>
                        <span class="box-dropdown__status"><svg class="box-dropdown__status-star"><use xlink:href="/images/dist/sprite.svg#star"></use></svg><?=$product->partner_status?></span>
                    </div>
                    <!-- /.box-dropdown__header-center -->

                    <a href="" class="box-dropdown__header-right js-toggle"><?=Yii::t("app","show")?></a>
                </div>
                <div class="box-dropdown__footer">
                    <?php foreach($product->items as $item):?>
                    <div class="box-dropdown__footer-item">
                        <div class="box-dropdown__footer-name"><?=$item->name?></div>
                        <div class="box-dropdown__footer-descript">
                            <?=$item->descr?>
                        </div>
                        <div class="box-dropdown__footer-right">
                            <span class="box-dropdown__footer-price"><?=$item->price?></span>
                            <a href="#" class="blueBtn box-dropdown__blueBtn"><?=Yii::t("integrator","request_price")?></a>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </section>

    <div class="func">
        <h2 class="h2 func__title"><?=Yii::t("integrator","specialization")?>: <a href=""><?=Yii::t("product","compare_product")?></a></h2>
        <div class="func__wrap">
            <ul class="list-func">
                <?php
                if(!empty($model->cats))
                foreach($model->cats as $cat):
                ?>
                <li><?=\backend\models\company\CompanyCategory::findOne($cat)->name?></li>
                <?php endforeach?>
            </ul>
        </div>
        <!-- /.func__wrap -->
    </div>
    <!-- /.func -->

    <div class="reviews" id="reviews">
        <h2 class="h2"><?=Yii::t("product","reviews")?></h2>
        <div class="info-row reviews__info-row">
            <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: 9 341</span>
            <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: 123</span>
        </div>
        <div class="reviews__header">
            <div class="reviews__header-col">
                <button type="button" class="blueBtn reviews__header-blueBtn"><?=Yii::t("product","send_review")?></button>
                <div class="reviews__header-item">
                    <div class="reivews__header-title"><?=Yii::t("product","conv")?></div>
                    <ul class="reviews__header-stars stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <div class="reviews__header-item">
                    <div class="reivews__header-title"><?=Yii::t("product","func")?></div>
                    <ul class="reviews__header-stars stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <div class="reviews__header-item">
                    <div class="reivews__header-title"><?=Yii::t("product","support")?></div>
                    <ul class="reviews__header-stars stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <div class="reviews__header-item">
                    <div class="reivews__header-title"><?=Yii::t("product","price")?></div>
                    <ul class="reviews__header-stars stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.reviews__header-col -->

            <div class="reviews__header-item">
                <div class="reivews__header-title"><?=Yii::t("product","average_rate")?>:</div>
                <ul class="reviews__header-stars stars">
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                </ul>
            </div>
        </div>

        <!--<div class="reviews-grid">
            <div class="reviews-grid__photo">
                <img src="/images/dist/no-photo.jpg" alt="">
            </div>
            <div class="reviews-grid__column">
                <strong class="reviews-grid__name">??????????????</strong>
                <div class="reviews-grid__descript">
                    ?????????? ?????????????? CRM ??????????????
                </div>
                <div class="reviews-grid__time">21 ???????????? 2021 ??.</div>
            </div>
            <div class="reviews-grid__column reviews-grid__column--descript">
                <span class="reviews__name">??????????:</span>
                <div class="reviews-grid__text">???????????? ?? ????????????????????????, ?? ?????? ?????????????????????? ??????????. ?????????????? ?? ???????????????? ?????? ?????????? ?????????? ??????????????????????. ???????? ???? ???????????? ????????????, ?????? ?????????????? ?????? ??????</div>
                <span class="reviews__name">????????????:</span>
                <div class="reviews-grid__text">?????????????????? ??????</div>
                <span class="reviews__name">?? ??????????:</span>
                <div class="reviews-grid__text">???? ???????????????? ???? ???????????? ????????????, ?? ?????????????? ?????????? ?????????????? ?????? ????????</div>
            </div>
            <div class="reviews-grid__stars">
                <span class="reviews-grid__title">????????????????</span>
                <ul class="stars">
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                </ul>
                <span class="reviews-grid__title">????????????????????</span>
                <ul class="stars">
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                </ul>
                <span class="reviews-grid__title">???????????? ??????????????????</span>
                <ul class="stars">
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                </ul>
                <span class="reviews-grid__title">????????</span>
                <ul class="stars">
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                </ul>
            </div>
        </div>
        <a href="" class="reviews__showBtn showBtn">???????????????? ?????? ????????????</a>-->
    </div>
    <!-- /.reviews -->
</div>
