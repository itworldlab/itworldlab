<?php

namespace backend\controllers\product;

use backend\models\product\ProductProp;
use backend\models\product\ProductPropForm;
use backend\models\product\PropType;
use Yii;
use backend\models\product\Product;
use backend\models\product\ProductSearch;
use yii\bootstrap4\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'uploadPhoto' => [
                'class' => 'budyaga\cropper\actions\UploadAction',
                'url' => '/uploads',
                'path' => '@frontend/web/uploads',
            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);



        $prop_form = new ProductPropForm();
        $prop_form->product_id = $model->id;
        if($prop_form->load(Yii::$app->request->post())){
            if($prop_form->SetProps()){
                Yii::$app->session->setFlash("success","Данные сохранены");
            }else{
                Yii::$app->session->setFlash("error",Html::errorSummary($prop_form));
            }
        }else{
            foreach(ProductProp::find()->where(['product_id'=>$model->id])->all() as $item){
                $prop_form->props[$item->prop_id] = 1;
            }
        }

        return $this->render('view', [
            'model' => $model,
            'prop_form' => $prop_form
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->validate()){
                if (!$model->upload()) {
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }
            if($model->save() && $model->SetCats() && $model->SetComp() && $model->SetAnalogs()){
                Yii::$app->session->setFlash("success","Сохранено");
                return $this->redirect('index');
            }else{
                Yii::$app->session->setFlash("error",Html::errorSummary($model));
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->validate()){
                if (!$model->upload()) {
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }
            if($model->save() && $model->SetCats() && $model->SetComp() && $model->SetAnalogs()){
                Yii::$app->session->setFlash("success","Сохранено");
                return $this->redirect('index');
            }else{
                Yii::$app->session->setFlash("error",Html::errorSummary($model));
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
