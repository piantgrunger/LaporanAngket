<?php

/* @var $this yii\web\View */

use miloschuman\highcharts\Highcharts;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\CloneKrs;

$this->title = 'Laporan Angket Dosen Universitas Islam Negeri Sunan Ampel';
 $form = ActiveForm::begin();
         


?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12">
          
              <?= $form->field($modelPeriode, 'periode')->widget(Select2::className(), [
                'data' => ['20191'=>'20191', '20182' =>'20182','20181' =>'20181'],
                'options' => ['placeholder' => 'Pilih Periode...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Tampilkan'), ['class' => 'btn btn-success']); ?>
            </div>
            <?php
            echo Highcharts::widget([
                'options' => [
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'title' => ['text' => 'Data Hasil Angket UINSA'],
                    'chart' => [
                        'type' => 'column'
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Rata Rata Hasil Angket '],
                      

                    ],

                    'xAxis' => [
                        'categories' => $series
                    ],
                    'series' => [
                        ['name' => 'Hasil Angket Fakultas', 'data' => $dataseries,   'dataLabels' => [
                'enabled' => true,]],

                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
         

            <?= $form->field($model, 'fakultas')->widget(Select2::className(), [
                'data' => $lookup,
                'options' => ['placeholder' => 'Pilih Fakultas...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Tampilkan'), ['class' => 'btn btn-success']); ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php
            echo Highcharts::widget([
                'options' => [
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'title' => ['text' => 'Data Hasil Angket UINSA'],
                    'chart' => [
                        'type' => 'column'
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Rata Rata Hasil Angket '],
                  
                    ],

                    'xAxis' => [
                        'categories' => $seriesFakultas
                    ],
                    'series' => [
                        ['name' => 'Hasil Angket Prodi', 'data' => $dataseriesFakultas,
                          'dataLabels' => [
                'enabled' => true,]],

                    ]
                ]
            ]); ?>

        </div>


    </div>


</div>