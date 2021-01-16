<?php
namespace pistol88\hospital\widgets;

use yii\base\Widget;
use pistol88\hospital\models\PatientForm as Model;
use pistol88\hospital\traits\Module;

class PatientForm extends Widget
{
    use Module;
    
    public $pjax = true;
    public $model = null;
    
    public function run()
    {
        if(!$model = $this->model) {
            $model = new Model;
        }
        
        return $this->render('patient-form', [
            'pjax' => $this->pjax,
            'model' => $model,
            'captcha' => $this->module->captcha,
        ]);
    }
}