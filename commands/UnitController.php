<?php
namespace app\commands;

use yii\console\Controller;
use app\models\CloneKrs;
use app\models\Mahasiswa;

class UnitController extends Controller
{
    public function actionIndex()
    {
        $krs = CloneKrs::find()->all();

        foreach ($krs as $dataKrs) {
            if (is_null($dataKrs->kodeunit)) {
                $mahasiswa = Mahasiswa::findOne($dataKrs->nim);
                $dataKrs->kodeunit = $mahasiswa->unit->kodeunit;
                $dataKrs->namaunit = $mahasiswa->unit->namaunit;
                $dataKrs->save('false');
                echo $dataKrs->nim ." - ".$dataKrs->namaunit.\n ;
            }
        }
    }
}
