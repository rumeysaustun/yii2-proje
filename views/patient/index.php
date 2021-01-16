<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('hospital', 'Patients List');

//$this->registerJs("
//    $(document).on('change', '.record-change-status input', function() {
//        $.post($(this).parents('.record-change-status').data('action'),
//            {update: true, id: $(this).parents('.record-change-status').data('id'), status: $(this).val(), '" . yii::$app->request->csrfParam . "': '" . yii::$app->request->csrfToken . "'},
//            function (answer) {
//
//            }
//        );
//    });
//");

?>
<h2><?= Html::encode($this->title) ?></h2>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statuses, [
                'class' => 'form-control',
                'prompt' => yii::t('hospital', 'Select') . '..'
            ]),
            'value' => function($model) use ($searchModel) {
                return $model->status == $searchModel::STATUS_NEW ? yii::t('hospital', 'New') : yii::t('hospital', 'Read');
                //return Html::tag('div', Html::radioList('status' . $model->id, $model->status, $model->getStatuses()), ['class' => 'record-change-status', 'data-action' => Url::toRoute(['/hospital/patient/update-status']), 'data-id' => $model->id]);
            },
        ],
        
        'name',
        'family',
        'phone',
        'email',
        'date',
        'time',
        [
            'class' => \yii\grid\ActionColumn::class,
            'template' => '{action} {update}',
            'buttons' => [
                'action' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                        'title' => yii::t('hospital', 'Action'),
                        'aria-label' => yii::t('hospital', 'Action'),
                        'data-pjax' => "0"
                    ]);
                }
            ],
        ]
    ]
]); ?>