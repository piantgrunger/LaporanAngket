<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rata_dosen_mk".
 *
 * @property string $periode
 * @property string $nip
 * @property string $namads
 * @property string $namamk
 * @property string $rata2
 */
class RataDosenMk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_rata_dosen_mk';
    }

    public static function primaryKey()
    {
        return ['nip','namamk'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periode', 'nip', 'namads', 'namamk'], 'required'],
            [['rata2'], 'number'],
            [['periode'], 'string', 'max' => 5],
            [['nip'], 'string', 'max' => 30],
            [['namads', 'namamk'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'periode' => 'Periode',
            'nip' => 'Nip',
            'namads' => 'Dosen',
            'namamk' => 'Mata Kuliah',
            'rata2' => 'Rata2',
        ];
    }

    public function getUnit()
    {
        return $this->hasOne(unit::className(), ['kodeunit' => 'kodeunit']);
    }
}
