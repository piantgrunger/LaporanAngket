<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RataDosenMKSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rata - Rata  Nilai Angket Dosen per Mata Kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rata-dosen-mk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    ?>


    <?php Pjax::begin(); ?>
  
                     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>     [   ['class' => 'yii\grid\SerialColumn'],

                    [
    'attribute'=>'periode',
    'filter'=>array("20181"=>"20181","20182"=>"20182"),
],
                                    'nip',
                                    'namads',
                                    'namamk',
                                    'namaunit',
                                    'fakultas',
                                    'rata2',

                                ],
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
    
        ],
            'toolbar' => [
           '{export}',
        '{toggleData}',
            ],
         'resizableColumns' => true,
    ]); ?>

    <?php Pjax::end(); ?>
</div>