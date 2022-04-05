<div class="container">
    <div class="catalog-services">
        <div class="filter">
            <div class="filter__result"><?=$dataProvider->totalCount?> <?=Yii::t("product","results")?></div>
            <button type="button" class="whiteBtn filter__whiteBtn"><?=Yii::t("product","clear_filters")?></button>
            <form class="filter__search" action="#" method="get">
                <button type="submit" class="filter__search-submit"><svg class="filter__search-icon"><use xlink:href="/images/dist/sprite.svg#loupe"></use></svg></button>
                <input type="text" placeholder="<?=Yii::t("integrator","find_by_integrator_name")?>" class="filter__search-input" required>
            </form>
            <div class="filter__item">
                <div class="filter__title"><?=Yii::t("product","integration")?>:</div>
                <?php foreach(\backend\models\company\CompanyCategory::find()->all() as $category):?>
                <input type="checkbox" class="filter__checkbox" id="check-<?=$category->id?>">
                <label for="check-<?=$category->id?>" class="filter__label"><?=$category->name?></label>
                <?php endforeach;?>
            </div>
            <!-- /.filter__item -->

            <!--<div class="filter__item">
                <div class="filter__title">Интегрируемое ПО:</div>
                <input type="checkbox" class="filter__checkbox" id="check-9">
                <label for="check-9" class="filter__label"><img src="/images/dist/bitrix24.png" alt="" class="filter__label-img">Bitrix 24</label>

                <input type="checkbox" class="filter__checkbox" id="check-10">
                <label for="check-10" class="filter__label"><img src="/images/dist/1C_Company_logo.jpg" alt="" class="filter__label-img">1С CRM</label>

                <input type="checkbox" class="filter__checkbox" id="check-11">
                <label for="check-11" class="filter__label"><img src="/images/dist/SAP.png" alt="" class="filter__label-img">SAP</label>

                <input type="checkbox" class="filter__checkbox" id="check-12">
                <label for="check-12" class="filter__label"><img src="/images/dist/it-logo.png" alt="" class="filter__label-img">1С Бухгалтерия</label>

                <a href="" class="showAllBtn filter__showAllBtn">Посмотреть все <svg class="showAllBtn__icon"><use xlink:href="/images/dist/sprite.svg#caret-big-right"></use></svg></a>
            </div>-->
            <!-- /.filter__item -->
            <div class="filter__item">
                <div class="filter__title"><?=Yii::t("product","location")?></div>
                <a class="location-link" href=""><svg class="location-link__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg><span><?=Yii::t("product","position")?></span></a>
            </div>
            <!-- /.filter__item -->
        </div>
        <!-- /.filter -->
        <div class="catalog-services__content">
            <?php
            echo \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '@frontend/components/company/_list_item',
                'summary' => false,
            ]);
            ?>

        </div>
        <!-- /.catalog-services__content -->
    </div>
    <!-- /.catalog-services -->

</div>
