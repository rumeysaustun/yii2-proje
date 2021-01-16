<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;

if($pjax) Pjax::begin(['id' => 'doctor-form-pjax']);
?>
    <?php if($done = Yii::$app->session->getFlash('doctorFormDone')) {
        echo Html::tag('div', $done, ['class' => 'alert alert-success']);
    } ?>

    <?php $form = ActiveForm::begin([
            'action' => Url::toRoute(['/hospital/doctor/form']),
            'id' => 'doctor-form',
            'options' => ['data-pjax' => true]
        ]); ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>

        <div class="form-group">
            <?= Html::submitButton(yii::t('hospital', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

<?php if($pjax) Pjax::end(); ?>