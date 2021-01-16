<h2><?= $patient->name . ' ' . $patient->family ?></h2>
<?= \pistol88\hospital\widgets\ActionForm::widget(['pjax' => $pjax, 'model' => $model, 'patient' => $patient]); ?>