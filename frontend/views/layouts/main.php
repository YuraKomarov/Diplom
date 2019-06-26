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
<div class="container">
    <div class="header-contacts">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <span id="address-icon"></span>
                    <div id="address">
                        г. Краснодар, ул. Зиповская 7
                    </div>
                </div>
            </div>
            <div class="offset-6 col-lg-2">
                <div class="row">
                    <span id="phone-icon"></span>
                    <div id="phone">
                        + 7(999)999-99-99
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="/" class="main-logo">
                <div class="row">

                        <div class="col-lg-2" id="logo">

                        </div>
                        <div class="col-lg-9" id="shop-name">
                            DigitalShop
                        </div>



                </div></a>
            </div>
            <div class="col-lg-8">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="/catalog">Каталог</a>
                    <a class="navbar-brand" href="#">Акции</a>
                    <a class="navbar-brand" href="#">О нас</a>
                    <input class="navbar-brand form-control form-control-sm" type="text" placeholder="Поиск"
                           style="width: 150px; height: 30px">
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $content ?>

<div class="footer">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>