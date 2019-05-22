<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clone_krs".
 *
 * @property integer $id_clone
 * @property string $periode
 * @property string $nim
 * @property string $namamhs
 * @property string $nip
 * @property string $namads
 * @property string $kodemk
 * @property string $namamk
 * @property integer $status
 * @property integer $id_kuisioner
 * @property string $kodeunit
 * @property string $namaunit
 *
 * @property NilaiKuisioner[] $nilaiKuisioners
 */
class CloneKrs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clone_krs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periode', 'nim', 'namamhs', 'nip', 'namads', 'kodemk', 'namamk'], 'required'],
            [['status', 'id_kuisioner'], 'integer'],
            [['periode'], 'string', 'max' => 5],
            [['nim', 'kodemk'], 'string', 'max' => 20],
            [['namamhs', 'namads', 'namamk'], 'string', 'max' => 150],
            [['nip'], 'string', 'max' => 30],
            [['kodeunit'], 'string', 'max' => 50],
            [['namaunit'], 'string', 'max' => 100],
            [['periode', 'nim', 'kodemk'], 'unique', 'targetAttribute' => ['periode', 'nim', 'kodemk'], 'message' => 'The combination of Periode, Nim and Kodemk has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_clone' => 'Id Clone',
            'periode' => 'Periode',
            'nim' => 'Nim',
            'namamhs' => 'Namamhs',
            'nip' => 'Nip',
            'namads' => 'Namads',
            'kodemk' => 'Kodemk',
            'namamk' => 'Namamk',
            'status' => 'Status',
            'id_kuisioner' => 'Id Kuisioner',
            'kodeunit' => 'Kodeunit',
            'namaunit' => 'Namaunit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiKuisioners()
    {
        return $this->hasMany(NilaiKuisioner::className(), ['id_clone' => 'id_clone']);
    }
}
