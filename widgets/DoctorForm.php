<?php
namespace pistol88\hospital\widgets;

use yii\base\Widget;
use pistol88\hospital\models\DoctorForm as Model;
use pistol88\hospital\traits\Module;

class DoctorForm extends Widget
{
    use Module;

    public $pjax = true;
    public $model = null;

    public function run()
    {
        if(!$model = $this->model) {
            $model = new Model;
        }

        return $this->render('doctor-form', [
            'pjax' => $this->pjax,
            'model' => $model,
            'captcha' => $this->module->captcha,
        ]);
    }

}