<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rata_fakultas".
 *
 * @property string $fakultas
 * @property string $rata2
 */
class RataFakultas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rata_fakultas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rata2'], 'number'],
            [['fakultas'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fakultas' => 'Fakultas',
            'rata2' => 'Rata2',
        ];
    }
}
