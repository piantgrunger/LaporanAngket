<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rata_jurusan".
 *
 * @property string $fakultas
 * @property string $namaunit
 * @property string $rata2
 */
class RataJurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_rata_jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rata2'], 'number'],
            [['fakultas', 'namaunit'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fakultas' => 'Fakultas',
            'namaunit' => 'Namaunit',
            'rata2' => 'Rata2',
        ];
    }
}
