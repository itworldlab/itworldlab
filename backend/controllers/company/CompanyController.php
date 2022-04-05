<?php

namespace backend\controllers\company;

use backend\models\company\CompaniesProductsSearch;
use backend\models\company\Company;
use backend\models\company\CompanySearch;
use Yii;
use yii\bootstrap4\Html;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
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
     * Lists all Company models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new CompaniesProductsSearch();
        $searchModel->company_id = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->validate()){
                if (!$model->upload()) {
                    Yii::$app->session->setFlash("error",Html::errorSummary($model));
                }
            }
            if($model->save() && $model->SetCats() && $model->SetRegions()){
                Yii::$app->session->setFlash("success","Сохранено");
                return $this->redirect('index');
            }else{
                var_dump($model->errors);
                Yii::$app->session->setFlash("error",Html::errorSummary($model));
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
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
            if($model->save() && $model->SetCats() && $model->SetRegions()){
                Yii::$app->session->setFlash("success","Сохранено");
                return $this->redirect('index');
            }else{
                var_dump($model->errors);
                Yii::$app->session->setFlash("error",Html::errorSummary($model));
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        throw new ForbiddenHttpException("Удаление запрещено");

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne(['id' => $id]))) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
