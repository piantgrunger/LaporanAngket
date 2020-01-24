<?php

namespace app\controllers;

use Yii;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RataFakultas;
use yii\helpers\ArrayHelper;
use app\models\RataJurusan;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {


        return $this->render('index');
    }
  
   public function actionGrafikAngket() {
        //   die(print_r($dataseries));

        $model = new DynamicModel([
            'fakultas',
        ]);
        $model->addRule(['fakultas'], 'safe');
       $modelPeriode = new DynamicModel([
            'periode',
        ]);
        $modelPeriode->addRule(['periode'], 'safe');
       $modelPeriode->periode = '20191';
        $seriesFakultas = [];
        $dataseriesFakultas = [];
     
      
         $data = RataFakultas::find()->select(["fakultas","rata2"])
           ->where(['periode' => $modelPeriode->periode] )
           ->orderBy('fakultas')-> asArray()->all();
          $series =  ArrayHelper::getColumn($data, 'fakultas');
        $lookup = ArrayHelper::map($data, 'fakultas', 'fakultas');
        $dataseries1 =  ArrayHelper::getColumn($data, 'rata2');
        $dataseries=array_map('floatval', $dataseries1);
       
       
        if ($modelPeriode->load(Yii::$app->request->post())) {
           $data = RataFakultas::find()->select(["fakultas","rata2"])
           ->where(['periode' => $modelPeriode->periode] )
           ->orderBy('fakultas')-> asArray()->all();
          $series =  ArrayHelper::getColumn($data, 'fakultas');
        $lookup = ArrayHelper::map($data, 'fakultas', 'fakultas');
        $dataseries1 =  ArrayHelper::getColumn($data, 'rata2');
        $dataseries=array_map('floatval', $dataseries1);
     
          
        }
        if ($model->load(Yii::$app->request->post())) {
            $data = RataJurusan::find()->select(["namaunit", "rata2"])->where(['fakultas'=>$model->fakultas , 'periode' => $modelPeriode->periode])->orderBy('namaunit')->asArray()->all();
            $seriesFakultas =  ArrayHelper::getColumn($data, 'namaunit');
            $dataseries1 =  ArrayHelper::getColumn($data, 'rata2');
            $dataseriesFakultas = array_map('floatval', $dataseries1);
        }




        return $this->render('grafik-angket', [
            'series' =>$series,
            'dataseries' => $dataseries,
            'seriesFakultas' => $seriesFakultas,
            'dataseriesFakultas' => $dataseriesFakultas,
            'lookup' => $lookup,

            'model' => $model,
            'modelPeriode' => $modelPeriode
          
        ]);
   }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect("http://ctrl.uinsby.ac.id/index/portal");
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
