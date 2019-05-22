<?php

use yii\helpers\Html;
use yii\grid\GridView;
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


    <?php Pjax::begin(); ?> <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'periode',
                                    'nip',
                                    'namads',
                                    'namamk',
                                    [
                                        'attribute' => "unit",
                                        "value" => 'namaunit'
                                    ],
                                    [
                                        'attribute' => "fakultas",
                                        "value" => 'unit.fakultas.namaunit'
                                    ],

                                    'rata2',

                                ],
                            ]); ?>
    <?php Pjax::end(); ?>
</div>