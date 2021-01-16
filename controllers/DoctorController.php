<?php
namespace pistol88\hospital\controllers;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use pistol88\hospital\models\DoctorForm;
use pistol88\hospital\models\DoctorSearch;

class DoctorController extends Controller
{
    public $layout = 'hospital';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => $this->module->adminRoles,
                    ]
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
        $model = new DoctorSearch();

        return $this->render('index', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'searchModel' => $model,
        ]);
    }

    public function actionForm()
    {
        $model = new DoctorForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            yii::$app->session->setFlash('doctorFormDone', yii::t('hospital', 'Thanks'));
            $model = new DoctorForm;
        }

        return $this->render('doctor-form', [
            'pjax' => yii::$app->request->isAjax ? true : false,
            'model' => $model,
        ]);
    }

}