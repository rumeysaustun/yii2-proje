<?php

use yii\web\View;
use yii\helpers\Url;

/* @var $this View */
/* @var $content string */
?>
<?php $this->beginContent(Yii::getAlias('@app/views/layouts/main.php')); ?>
    <div class="row">
        <div class="col-md-4">
            <ul class="list-unstyled">
                <li><a href="<?= Url::to(['patient/index']) ?>"><?= yii::t('hospital', 'Patients List') ?></a></li>
                <li><a href="<?= Url::to(['patient/form']) ?>"><?= yii::t('hospital', 'New Patient') ?></a></li>
                <li><a href="<?= Url::to(['doctor/index']) ?>"><?= yii::t('hospital', 'Doctors List') ?></a></li>
                <li><a href="<?= Url::to(['doctor/form']) ?>"><?= yii::t('hospital', 'New Doctor') ?></a></li>
                <li><a href="<?= Url::to(['action/index']) ?>"><?= yii::t('hospital', 'Actions List') ?></a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent() ?>
