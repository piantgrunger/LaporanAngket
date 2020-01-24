<?php

namespace app\controllers;

use Yii;
use app\models\RataDosenMK;
use app\models\RataDosenMKSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RataDosenMKController implements the CRUD actions for RataDosenMK model.
 */
class RataDosenMkController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all RataDosenMK models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RataDosenMKSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RataDosenMK model.
     * @param string $nip
     * @param string $namamk
     * @return mixed
     */
    public function actionView($nip, $namamk)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip, $namamk),
        ]);
    }

    /**
     * Creates a new RataDosenMK model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RataDosenMK();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip' => $model->nip, 'namamk' => $model->namamk]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RataDosenMK model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip
     * @param string $namamk
     * @return mixed
     */
    public function actionUpdate($nip, $namamk)
    {
        $model = $this->findModel($nip, $namamk);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip' => $model->nip, 'namamk' => $model->namamk]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RataDosenMK model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip
     * @param string $namamk
     * @return mixed
     */
    public function actionDelete($nip, $namamk)
    {
        $this->findModel($nip, $namamk)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RataDosenMK model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip
     * @param string $namamk
     * @return RataDosenMK the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip, $namamk)
    {
        if (($model = RataDosenMK::findOne(['nip' => $nip, 'namamk' => $namamk])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
