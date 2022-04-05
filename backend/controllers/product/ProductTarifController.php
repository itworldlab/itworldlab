<?php

namespace backend\controllers\product;

use backend\models\product\ProductTarif;
use backend\models\product\ProductTarifSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductTarifController implements the CRUD actions for ProductTarif model.
 */
class ProductTarifController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ProductTarif models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductTarifSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTarif model.
     * @param int $id ID
     * @param int $product_id Product ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $product_id),
        ]);
    }

    /**
     * Creates a new ProductTarif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductTarif();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'product_id' => $model->product_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTarif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $product_id Product ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $product_id)
    {
        $model = $this->findModel($id, $product_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTarif model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $product_id Product ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $product_id)
    {

        throw new ForbiddenHttpException("Удаление запрещено");

        $this->findModel($id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTarif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $product_id Product ID
     * @return ProductTarif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $product_id)
    {
        if (($model = ProductTarif::findOne(['id' => $id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
