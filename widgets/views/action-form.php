<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;

if($pjax) Pjax::begin(['id' => 'action-form-pjax']);
?>
<?php if($done = Yii::$app->session->getFlash('actionFormDone')) {
    echo Html::tag('div', $done, ['class' => 'alert alert-success']);
} ?>

    <?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['/hospital/patient/action', 'id' => $patient->id]),
        'id' => 'action-form',
        'options' => ['data-pjax' => true]
    ]); ?>
    <?= $form->field($model, 'patient_id')->hiddenInput(['value' => $patient->id])->label(false) ?>
    <?= $form->field($model, 'doctor_id')->dropDownList(\rumeysaustun\hospital\models\DoctorForm::map(), ['autofocus' => true]) ?>
    <?= $form->field($model, 'action')->textarea() ?>
    <?= $form->field($model, 'recipe')->textarea() ?>
    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>
    <?= $form->field($model, 'time')->textInput(['type' => 'time']) ?>

    <div class="form-group">
        <?= Html::submitButton(yii::t('hospital', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php if($pjax) Pjax::end(); ?>
