<?php

namespace backend\controllers\product;

use Yii;
use backend\models\product\Prop;
use backend\models\product\PropSearch;
use yii\bootstrap4\Html;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PropController implements the CRUD actions for Prop model.
 */
class PropController extends Controller
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
        ];
    }

    /**
     * Lists all Prop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prop model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($prop_type_id)
    {
        $model = new Prop();

        $model->prop_type_id = $prop_type_id;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->validate()){
                if (!$model->upload()) {
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }
            if($model->save()){
                Yii::$app->session->setFlash("success","Сохранено");
//                return $this->redirect(['create','prop_type_id'=>$prop_type_id]);
                return $this->redirect(['index','PropSearch[prop_type_id]'=>$prop_type_id]);
            }else{
                if(!empty($model->errors)){
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prop model.
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
            if($model->save()){
                Yii::$app->session->setFlash("success","Сохранено");
                return $this->redirect(['index','PropSearch[prop_type_id]'=>$model->prop_type_id]);
            }else{
                if(!empty($model->errors)){
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        throw new ForbiddenHttpException("Удаление запрещено");

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Prop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prop::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
