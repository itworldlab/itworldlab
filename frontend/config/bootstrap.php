<?php
Yii::$container->set('lav45\translate\TranslatedBehavior', [
    'language' => isset($_GET['_lang']) ? $_GET['_lang'] : "ru"
]);
\yii\base\Event::on('yii\base\Controller', 'beforeAction', function($event) {
    /** @var yii\filters\ContentNegotiator $negotiator */
    $negotiator = Yii::createObject([
        'class' => 'yii\filters\ContentNegotiator',
        'languages' => \lav45\translate\models\Lang::getLocaleList(),
    ]);
    /** @var yii\base\ActionEvent $event */
    $negotiator->attach($event->action);
    $negotiator->negotiate();
});