<?php

namespace app\controllers;

use Yii;
use app\models\RataAspek;
use app\models\RataAspekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RataAspekController implements the CRUD actions for RataAspek model.
 */
class RataAspekController extends Controller
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
     * Lists all RataAspek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RataAspekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RataAspek model.
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
     * Creates a new RataAspek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RataAspek();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip' => $model->nip, 'namamk' => $model->namamk]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RataAspek model.
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
     * Deletes an existing RataAspek model.
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
     * Finds the RataAspek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip
     * @param string $namamk
     * @return RataAspek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip, $namamk)
    {
        if (($model = RataAspek::findOne(['nip' => $nip, 'namamk' => $namamk])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
