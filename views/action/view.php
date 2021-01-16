<h2><?= yii::t('hospital',  'Patient') . ': ' . $model->patient->name . ' ' . $model->patient->family ?></h2>
<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'date',
        'time',
        [
            'attribute' => 'doctor_id',
            'value' => $model->doctor->name,
        ],
        'action',
        'recipe'
    ]
]);