<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('hospital', 'Doctors List');
?>
<h2><?= Html::encode($this->title) ?></h2>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        'phone',
        'email',
    ]
]); ?>