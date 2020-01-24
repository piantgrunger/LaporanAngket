<?php
namespace app\models;

use Yii;

class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akademik.ms_mahasiswa';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }
  
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['kodeunit' => 'kodeunit']);
    }
}
