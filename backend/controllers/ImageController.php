<?php

namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ImageController extends Controller
{
    public function actionGet($image){
        $file = \Yii::getAlias("@frontend")."/web/uploads/".$image;
        return Yii::$app->response->sendFile($file);
        $response = \Yii::$app->response;
        $response->format = yii\web\Response::FORMAT_RAW;
        $response->headers->add('content-type', 'image/jpeg');
        $img_data = file_get_contents($file);
        $response->data = $img_data;
        return $response;
    }

}