<?php

namespace frontend\controllers;

use yii\web\Controller;

class EducationController extends Controller
{

    public function actionIndex(){


        return $this->render("index");
    }

    public function actionCatalog(){

        return $this->render("catalog");
    }

}
