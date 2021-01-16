<?php
namespace pistol88\hospital\models;

use yii;
use yii\db\ActiveRecord;

class PatientForm extends ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_READ = 1;

    public static function tableName()
    {
        return 'hospital_patient';
    }

    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }
    
    public function getStatuses()
    {
        return [
            self::STATUS_NEW => yii::t('hospital', 'New'),
            self::STATUS_READ => yii::t('hospital', 'Read'),
        ];
    }
    
    public function getStatusName()
    {
        switch($this->status) {
            case self::STATUS_NEW: return yii::t('hospital', 'New');
            case self::STATUS_READ: return yii::t('hospital', 'Read');
        }
        
        return '';
    }
    
    public function rules()
    {
        return [
            [['name', 'family', 'date', 'time'], 'required'],
            [['name', 'family', 'email', 'phone'], 'string', 'max' => 55],
            [['phone', 'email'], 'emailAndPhoneValidation', 'skipOnEmpty' => false],
            ['email', 'email'],
            [['date', 'time'], 'string'],
        ];
    }

    public function emailAndPhoneValidation($attribute, $params)
    {
        if(empty($this->phone) && empty($this->email)) {
            $this->addError($attribute, yii::t('hospital', 'Phone or E-Mail is required'));
        }
    }
    
    public function attributeLabels()
    {
        return [
            'name' => yii::t('hospital', 'Name'),
            'status' => yii::t('hospital', 'Status'),
            'family' => yii::t('hospital', 'Family'),
            'email' => yii::t('hospital', 'E-Mail'),
            'phone' => yii::t('hospital', 'Phone'),
            'date' => yii::t('hospital', 'Date'),
            'time' => yii::t('hospital', 'Time'),
        ];
    }

    public static function map()
    {
        return yii\helpers\ArrayHelper::map(self::find()->all(), 'id', function($model) {
            return $model->name . ' ' . $model->family;
        });
    }
}
