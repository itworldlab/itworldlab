<?php

namespace frontend\controllers;

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

        $prop_types = PropType::find()->asArray(true)->all();

        return $this->render("view",[
            'model' => $model,
            'prop_types' => $prop_types
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