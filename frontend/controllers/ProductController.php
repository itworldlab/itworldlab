<?php

namespace frontend\controllers;

use backend\models\company\Company;
use backend\models\product\ProductAnalog;
use backend\models\product\ProductCompatibility;
use backend\models\product\PropType;
use frontend\models\product\Product;
use frontend\models\product\ProductSearch;
use lav45\translate\models\Lang;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            [
                // ContentNegotiator will be determined from a URL or browser language settings and install it in
                // Yii::$app->language, which uses the class TranslatedBehavior as language translation
                'class' => 'yii\filters\ContentNegotiator',
                'languages' => Lang::getLocaleList()
            ],
        ];
    }

    public function actionIndex($category_id = 0){
        $productsSearchModel = new ProductSearch();
        $productsSearchModel->category_id = $category_id;
        $productsDataProvider = $productsSearchModel->search(\Yii::$app->request->queryParams);

        return $this->render("index",[
            'productsSearchModel' => $productsSearchModel,
            'productsDataProvider' => $productsDataProvider
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id){
        $model = $this->findModel($id);

        $prop_types = PropType::find()->asArray(true);

        if(!isset($_GET['category_id'])){
            $prop_types = $prop_types->where(['category_id'=>\Yii::$app->request->get("category_id")]);
        }else{
            $prop_types = $prop_types->where(['category_id'=>0]);
        }

        $compatibility = ProductCompatibility::find()->where(['product_id'=>$model->id])->all();
        $analogs = ProductAnalog::find()->where(['product_id'=>$model->id])->all();

        $comps = [];
        foreach($model->companies as $company){
            $comps[] = $company->company_id;
        }
        $companies = Company::find()->where(['in','id',$comps])->all();

        return $this->render("view",[
            'model' => $model,
            'companies' => $companies,
            'prop_types' => $prop_types->all(),
            'compatibility' => $compatibility,
            'analogs' => $analogs
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCompare(){
        return $this->render("compare",[
        ]);
    }

    public function findModel($id){
        if(($model = Product::findOne($id)) !== null){
            return $model;
        }

        throw new NotFoundHttpException("Продукт не найден");
    }

}
