<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('hospital', 'Actions List');
?>
<h2><?= Html::encode($this->title) ?></h2>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'date',
            'filterInputOptions' => ['type' => 'date', 'class' => 'form-control']
        ],
        [
            'attribute' => 'time',
            'filterInputOptions' => ['type' => 'time', 'class' => 'form-control']
        ],
        [
            'attribute' => 'doctor_id',
            'filter' => \pistol88\hospital\models\DoctorForm::map(),
            'value' => function($model) {
                if ($doctor = $model->doctor) {
                    return $doctor->name;
                }
            }
        ],
        [
            'attribute' => 'patient_id',
            'filter' => \pistol88\hospital\models\PatientForm::map(),
            'value' => function($model) {
                if ($patient = $model->patient) {
                    return $patient->name . ' ' . $patient->family;
                }
            }
        ],
        [
            'class' => \yii\grid\ActionColumn::class,
            'template' => '{view}',
        ]
    ]
]); ?>