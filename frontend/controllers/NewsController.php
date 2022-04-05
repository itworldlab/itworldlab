<?php

namespace frontend\controllers;

use backend\models\post\Post;
use yii\db\Expression;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex(){
        $posts = Post::find()->orderBy(new Expression('rand()'))->all();

        return $this->render("index",[
            'posts' => $posts,
        ]);
    }

    public function actionView(){

        return $this->render("view");
    }

}
