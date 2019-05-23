<?php

/* @var $this yii\web\View */

use miloschuman\highcharts\Highcharts;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Laporan Angket Dosen Universitas Islam Negeri Sunan Ampel';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12">
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
                        ['name' => 'Hasil Angket Fakultas', 'data' => $dataseries],

                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin();
            ?>

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
                        ['name' => 'Hasil Angket Prodi', 'data' => $dataseriesFakultas],

                    ]
                ]
            ]); ?>

        </div>


    </div>


</div>