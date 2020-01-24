
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Executive Summary UINSA',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);







      //  if (!yii::$app->user->isGuest)
        {
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Laporan' ,'url' => '#', 'items' =>[
                    ['label' => 'Data Angket Dosen per Mata Kuliah' ,'url' =>['rata-dosen-mk/index']],
                    ['label' => 'Data Angket Dosen per Prodi' ,'url' =>['rata-dosen/index']],
                    ['label' => 'Aspek Angket Dosen per Mata Kuliah' ,'url' =>['rata-aspek/index']],
            
                ] ],
                 ['label' => 'Grafik' ,'url' => '#', 'items' =>[
                    ['label' => 'Grafik Angket Dosen' ,'url' =>['site/grafik-angket']],
                ] ],
             
             //   ['label' =>Yii::$app->user->identity->username .' - (Log Out)' ,'url' =>['/site/logout'],'linkOptions'=>['data-method'=>'POST']]

            ],
            ]);
        }

        NavBar::end();
        ?>




        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; PUSTIPD <?= date('Y') ?></p>

            <p class="pull-right">Universitas Islam Negeri Sunan Ampel</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
