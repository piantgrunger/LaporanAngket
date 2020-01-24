<?php
namespace app\models;

use Yii;

class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gate.ms_unit';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }
    public function getFakultas()
    {
        return $this->hasOne(Unit::className(), ['kodeunit' => 'kodeunitparent']);
    }
}
