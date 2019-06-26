<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Exo|Exo+2" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>

<div id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">

                        <div class="col-lg-2" id="logo">

                        </div>
                        <div class="col-lg-9" id="shop-name">
                            DigitalShop
                        </div>



                </div>
            </div>
            <div class="col-lg-8">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="/admin/catalog">Категории</a>
                    <a class="navbar-brand" href="/admin/products">Все товары</a>
                    <a class="navbar-brand" href="/admin/banners">Баннеры</a>
                    <a class="navbar-brand" href="/admin/brands">Бренды</a>
                    <a class="navbar-brand" href="#">Акции</a>
                    <a class="navbar-brand" href="#">О нас</a>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $content ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>