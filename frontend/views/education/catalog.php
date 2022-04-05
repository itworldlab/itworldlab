<div class="container">
    <!--<div class="selectBox">
        <select class="select selectBox__select">
            <option value="">Продукт</option>
            <option value="">Продукт 1</option>
            <option value="">Продукт 2</option>
        </select>
        <select class="select selectBox__select">
            <option value="">Направление</option>
            <option value="">Продукт 1</option>
            <option value="">Продукт 2</option>
        </select>
        <select class="select selectBox__select">
            <option value="">Уровень сложности</option>
            <option value="">Продукт 1</option>
            <option value="">Продукт 2</option>
        </select>
    </div>-->
    <!-- /.selectBox -->

    <div class="edu-catalog">

        <?php
        for($i = 0; $i <= 30; $i++):
        ?>
        <div class="edu-catalog__item">
            <div class="edu-catalog__header">
                <img src="/images/dist/1C_Company_logo_small.svg" class="edu-catalog__logo" alt="">
                <h6 class="h6 edu-catalog__title"><?=Yii::t("learning","name_test")?></h6>
            </div>
            <div class="edu-catalog__descript">
                <div class="edu-catalog__left">
                    <div class="edu-catalog__small"><?=Yii::t("product","descr")?>:</div>
                    <div class="edu-catalog__text">
                        <?=Yii::t("learning","descr")?>
                    </div>
                </div>
                <div class="edu-catalog__right">
                    <div class="edu-catalog__small"><?=Yii::t("learning","info")?>:</div>
                    <ul class="edu-catalog__list">
                        <li><?=Yii::t("learning","learned")?>: -</li>
                        <li><?=Yii::t("learning","hours")?>: -.</li>
                    </ul>
                </div>
            </div>
            <a href="" class="blueBtn edu-catalog__blueBtn"><?=Yii::t("learning","view_cource")?></a>
        </div>
        <?php endfor?>
    </div>
    <!-- /.edu-catalog -->
</div>
