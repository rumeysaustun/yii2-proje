<?php
namespace rumeysaustun\hospital;

class Module extends \yii\base\Module
{
    public $captcha = false; //show captcha
    public $adminRoles = ['@']; //['superadmin', 'administrator', 'admin']; //roles who can see orders
}
