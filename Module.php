<?php
namespace rumeysaustun\hospital;

class Module extends \yii\base\Module
{
    public $captcha = false; //show captcha
    public $adminRoles = ['@']; //['superadmin', 'administrator', 'admin']; //roles who can see orders

    public function init()
    {
        parent::init();

        $this->registerTranslation();
    }

    public function registerTranslation()
    {
        if (!isset(\Yii::$app->i18n->translations['hospital'])) {
            \Yii::$app->i18n->translations['hospital'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__.'/messages',
                'forceTranslation' => true
            ];
        }
    }
}

