<?php
namespace pistol88\hospital\models;

use yii;
use yii\data\ActiveDataProvider;

class DoctorSearch extends DoctorForm
{
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = DoctorForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) return $dataProvider;
        
        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}