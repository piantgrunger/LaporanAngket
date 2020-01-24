<?php
namespace app\models;

use Yii;

class Kurikulum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akademik.ak_kurikulum';
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
