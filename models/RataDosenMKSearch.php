<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RataDosenMK;

/**
 * RataDosenMKSearch represents the model behind the search form about `app\models\RataDosenMK`.
 */
class RataDosenMKSearch extends RataDosenMK
{
    public $unit;
    public $fakultas;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periode', 'nip', 'namads', 'namamk','unit','fakultas'], 'safe'],
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

    public function getMKSiakadbyUnit($unit)
    {
        return  (new \yii\db\Query)->select(['kodemk'])->from('akademik.ak_kurikulum')
            ->innerJoin('gate.ms_unit', 'akademik.ak_kurikulum.kodeunit = gate.ms_unit.kodeunit ')
            ->where(['like', 'namaunit', $unit])
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
            ->andFilterWhere(['like', 'namamk', $this->namamk]);
        if (!is_null($this->unit)) {
            $mk = $this->getMKSiakadbyUnit($this->unit);
            print_r($mk);
            die();
            $query->andWhere(['in','kodemk',$mk]);
        }


        return $dataProvider;
    }
}
