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
class RataDosen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_rata_dosen';
    }

    public static function primaryKey()
    {
        return ['nip','namamk'];
    }

    /**
     * @inheritdoc
     */

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
