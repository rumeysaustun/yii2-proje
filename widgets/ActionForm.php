<?php
namespace rumeysaustun\hospital\widgets;

use yii\base\Widget;
use rumeysaustun\hospital\models\ActionForm as Model;
use rumeysaustun\hospital\traits\Module;

class ActionForm extends Widget
{
    use Module;

    public $pjax = true;
    public $model = null;
    public $patient;

    public function run()
    {
        if(!$model = $this->model) {
            $model = new Model;
        }

        return $this->render('action-form', [
            'pjax' => $this->pjax,
            'model' => $model,
            'patient' => $this->patient,
            'captcha' => $this->module->captcha,
        ]);
    }
}
