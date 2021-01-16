<?php
namespace pistol88\hospital\models;

use yii;
use yii\db\ActiveRecord;

class ActionForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'hospital_action';
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
            [['action', 'recipe', 'date', 'time', 'doctor_id', 'patient_id'], 'required'],
            [['action', 'recipe'], 'safe'],
            [['date', 'time'], 'string'],

            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorForm::class, 'targetAttribute' => ['doctor_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientForm::class, 'targetAttribute' => ['patient_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'action' => yii::t('hospital', 'Observation & Operation'),
            'recipe' => yii::t('hospital', 'Recipe'),
            'date' => yii::t('hospital', 'Action Date'),
            'time' => yii::t('hospital', 'Action Time'),
            'doctor_id' => yii::t('hospital', 'Doctor'),
            'patient_id' => yii::t('hospital', 'Patient'),
        ];
    }

    public function getPatient()
    {
        return $this->hasOne(PatientForm::class, ['id' => 'patient_id']);
    }

    public function getDoctor()
    {
        return $this->hasOne(DoctorForm::class, ['id' => 'doctor_id']);
    }

    public static function map()
    {
        return yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}