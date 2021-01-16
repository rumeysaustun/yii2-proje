<?php
namespace pistol88\hospital\models;

use yii;
use yii\data\ActiveDataProvider;

class ActionSearch extends ActionForm
{
    public function rules()
    {
        return [
            [['doctor_id', 'patient_id'], 'integer'],
            [['date', 'time'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = ActionForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) return $dataProvider;

        $query->andFilterWhere([
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
        ]);

        $query
            ->andFilterWhere(['>=', 'date', $this->date])
            ->andFilterWhere(['>=', 'time', $this->time]);

        return $dataProvider;
    }
}