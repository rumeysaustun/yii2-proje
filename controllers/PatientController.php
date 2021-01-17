<?php
namespace rumeysaustun\hospital\controllers;

use rumeysaustun\hospital\models\ActionForm;
use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use rumeysaustun\hospital\models\PatientForm;
use rumeysaustun\hospital\models\PatientSearch;

class PatientController extends Controller
{
    public $layout = 'hospital';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update-status'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => $this->module->adminRoles,
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['update-status'],
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
        $model = new PatientSearch();

        return $this->render('index', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'searchModel' => $model,
        ]);
    }
    
    public function actionUpdateStatus()
    {
        $model = PatientForm::findOne(yii::$app->request->post('id'));
        $model->status = yii::$app->request->post('status');
        $model->save();
        
        return json_encode(['result' => 'success']);
    }
    
    public function actionForm()
    {
        $model = new PatientForm;
        
        $model->status = 0;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            yii::$app->session->setFlash('patientFormDone', yii::t('hospital', 'Thanks'));
            $model = new PatientForm;
        }
        
        return $this->render('patient-form', [
            'pjax' => yii::$app->request->isAjax ? true : false,
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = PatientForm::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            yii::$app->session->setFlash('patientFormDone', yii::t('hospital', 'Thanks'));
            $model = new PatientForm;
        }

        return $this->render('patient-form', [
            'pjax' => yii::$app->request->isAjax ? true : false,
            'model' => $model,
        ]);
    }

    public function actionAction($id)
    {
        $model = new ActionForm;
        $patient = PatientForm::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            $patient->status = 1;
            $patient->save();
            yii::$app->session->setFlash('actionFormDone', yii::t('hospital', 'Thanks'));
            return $this->redirect(['index']);
        }

        return $this->render('action-form', [
            'pjax' => yii::$app->request->isAjax ? true : false,
            'model' => $model,
            'patient' => $patient,
        ]);
    }
}
