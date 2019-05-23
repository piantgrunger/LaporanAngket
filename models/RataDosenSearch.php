<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RataDosenMK;

/**
 * RataDosenMKSearch represents the model behind the search form about `app\models\RataDosenMK`.
 */
class RataDosenSearch extends RataDosenMK
{
    public $unit;
    public $fakultas;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periode', 'nip', 'namads', 'unit','fakultas','namaunit'], 'safe'],
            [['rata2'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getDataUnit($unit)
    {
        return  (new \yii\db\Query)->select(['m.kodeunit'])
        ->distinct()
        ->from('gate.ms_unit m')
        ->innerJoin('gate.ms_unit m1', 'm.kodeunitparent = m1.kodeunit')
            ->where(['like', 'lower(m1.namaunit)', $unit])
            ->all(yii::$app->db_siakad);
    }



    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RataDosenMK::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'rata2' => $this->rata2,
        ]);

        $query->andFilterWhere(['like', 'periode', $this->periode])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'namads', $this->namads])
           ->andFilterWhere(['like', 'namaunit', $this->namaunit])
        ->andFilterWhere(['like', 'fakultas', $this->fakultas]);
        $query->andWhere(["periode" => yii::$app->params['periode']]);

        $query->orderBy('kodeunit,rata2 desc');
        return $dataProvider;
    }
}
