<?php
Yii::$container->set('lav45\translate\TranslatedBehavior', [
    'language' => isset($_GET['lang_id']) ? $_GET['lang_id'] : "ru"
]);