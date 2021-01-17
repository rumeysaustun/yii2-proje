<h2><?= $patient->name . ' ' . $patient->family ?></h2>
<?= \rumeysaustun\hospital\widgets\ActionForm::widget(['pjax' => $pjax, 'model' => $model, 'patient' => $patient]); ?>
