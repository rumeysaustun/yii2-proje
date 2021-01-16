<?php
namespace pistol88\hospital\models;

use yii;
use yii\db\ActiveRecord;

class DoctorForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'hospital_doctor';
    }

    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'email', 'phone'], 'string', 'max' => 55],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => yii::t('hospital', 'Name Lastname'),
            'email' => yii::t('hospital', 'E-Mail'),
            'phone' => yii::t('hospital', 'Phone'),
        ];
    }

    public static function map()
    {
        return yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}