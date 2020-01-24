<?php
namespace app\commands;

use yii\console\Controller;
use app\models\CloneKrs;
use app\models\Mahasiswa;

class UnitController extends Controller
{
    public function actionIndex()
    {
     
        $krs = CloneKrs::find()
          ->where("kodeunit is null")
          ->all()
          ;

        foreach ($krs as $dataKrs) {
            if (is_null($dataKrs->kodeunit)) {
                  $mahasiswa = Mahasiswa::findOne($dataKrs->nim);
                if (!is_null($mahasiswa)) {
                  $dataKrs->kodeunit = $mahasiswa->unit->kodeunit;
                  $dataKrs->namaunit = $mahasiswa->unit->namaunit;
                  $dataKrs->save('false');
                   echo $dataKrs->nim ." - ".$dataKrs->namaunit."\n" ;
                }  
            }
          
        }
        
           
          
          $krs = CloneKrs::find()
          ->where("fakultas is null")
          ->all()
          ;
         
        $i=1;
        foreach ($krs as $dataKrs) {
            if (is_null($dataKrs->fakultas)) {
                $mahasiswa = Mahasiswa::findOne($dataKrs->nim);
                if (!is_null($mahasiswa)) {
                  $dataKrs->fakultas = $mahasiswa->unit->fakultas->namaunit;
                  $dataKrs->save('false');
                   echo $i.'-'.count($krs)."  ". $dataKrs->nim ." - ".$dataKrs->fakultas."\n" ;
                }  
              $i++;
            }
        }
        
        

    }
}
