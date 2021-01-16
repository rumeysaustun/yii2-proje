<?php
namespace pistol88\hospital\models;

use yii;
use yii\data\ActiveDataProvider;

class PatientSearch extends PatientForm
{
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'family', 'email', 'phone'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = PatientForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) return $dataProvider;

        $query->andFilterWhere([
            'status' => $this->status,
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
} 