<?php

namespace frontend\controllers;

use backend\models\company\CompaniesProducts;
use backend\models\company\Company;
use backend\models\company\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CompanyController extends Controller
{
    public function actionIndex(){
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id){
        $model = $this->findModel($id);

        return $this->render("view",[
            'model' => $model,
        ]);
    }

    public function findModel($id){
        if(($model = Company::findOne($id)) !== null){
            return $model;
        }

        throw new NotFoundHttpException("Продукт не найден");
    }

}
