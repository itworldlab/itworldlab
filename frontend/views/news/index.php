<div class="container newBox">
    <div class="newsBox__wrapper">
        <!--<ul class="breadcrumbs">
            <li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>
            <li class="breadcrumbs__item">Новости</li>
        </ul>-->

        <div class="newsBox__grid">
            <div class="newsBox__grid-left">
                <?php $post = \backend\models\post\Post::find()->limit(1)->one();?>
                <?php if(!empty($post)):?>
                <div class="newsBox__item">
                    <div class="newsBox__item-images">
                        <img src="/uploads/<?=$post->image?>" class="newsBox__item-images__img" alt="">
                        <span class="newsBox__item-label newsBox__item-images__label"><?=$post->postCategory->name?></span>
                    </div>
                    <h6 class="h6 newsBox__title"><?=$post->title?></h6>
                    <p class="newsBox__descript"><?=mb_substr($post->descr,0,100);?></p>
                    <!--<div class="hashtags">
                        <a href="/news/view">#ключевые_слова</a>
                        <a href="/news/view">#ключевые</a>
                        <a href="/news/view">#ключевые_слова</a>
                    </div>-->
                    <div class="newsBox__footer">
                        <span class="newsBox__date">14.12.2021</span>
                        <span class="newsBox__watch">0</span>
                    </div>
                </div>
                <?php endif?>
                <div class="newsBox__grid-two">
                    <?php foreach(\backend\models\post\Post::find()->offset(1)->limit(4)->all() as $post):?>
                    <div class="newsBox__item">
                        <div class="newsBox__item-images">
                            <img src="/uploads/<?=$post->image?>" class="newsBox__item-images__img" alt="">
                            <span class="newsBox__item-label newsBox__item-images__label"><?=$post->postCategory->name?></span>
                        </div>
                        <h6 class="h6 newsBox__title"><?=$post->title?></h6>
                        <p class="newsBox__descript"><?=mb_substr($post->descr,0,100);?></p>
                        <!--<div class="hashtags">
                            <a href="/news/view">#ключевые_слова</a>
                            <a href="/news/view">#ключевые</a>
                            <a href="/news/view">#ключевые_слова</a>
                        </div>-->
                        <div class="newsBox__footer">
                            <span class="newsBox__date">14.12.2021</span>
                            <span class="newsBox__watch">0</span>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
                <!-- /.newsBox__grid-two -->
            </div>
            <!-- /.newsBox__grid-left -->
            <div class="newsBox__grid-right">
                <?php foreach(\backend\models\post\Post::find()->offset(5)->all() as $post):?>
                <div class="newsBox__item newsBox__item-sidebar">
                    <h6 class="h6 newsBox__title"><?=$post->title?></h6>
                    <p class="newsBox__descript"><?=$post->descr?></p>
                    <span class="newsBox__item-label"><?=$post->postCategory->name?></span>
                    <!--<div class="hashtags">
                        <a href="/news/view">#ключевые_слова</a>
                        <a href="/news/view">#ключевые</a>
                        <a href="/news/view">#ключевые_слова</a>
                    </div>-->
                    <div class="newsBox__footer">
                        <span class="newsBox__date">14.12.2021</span>
                        <span class="newsBox__watch">0</span>
                    </div>
                </div>
                <?php endforeach?>
            </div>
            <!-- /.newsBox__grid-right -->
        </div>
    </div>
    <!-- /.newsBox__wrapper -->
</div>
