<?php
namespace rumeysaustun\hospital\controllers;

use rumeysaustun\hospital\models\ActionForm;
use rumeysaustun\hospital\models\ActionSearch;
use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ActionController extends Controller
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
        $model = new ActionSearch;

        return $this->render('index', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'searchModel' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => ActionForm::findOne($id)
        ]);
    }
}
