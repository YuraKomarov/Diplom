
<?php
$this->title = 'Баннеры';
?>

<?
use yii\helpers\Html;
?>


<div class="container">
    <div class="row">
        <div id="popular-category" style="margin: 70px 0 70px">
            Баннеры из главного слайдера
        </div>
    </div>
    <div class="row">
        <?php foreach($allBanners as $banner): ?>
            <div class="col-lg-3 category-item banner-item">
                <a href="<?= \yii\helpers\Url::to(['admin/bannerchange', 'id' => $banner->id]) ?>">
                    <div class="category-block" align="center">
                        <img src="<?= $banner->picture?>" alt="" class="category-image">
                        <div class="row">
                            <span class="category-name"><?= $banner->title?></span>
                        </div>
                    </div>
                </a>
                <div class="banner-delete-block">
                    <div class="row">
                        <div class="delete-banner-button"  >
                            <?= Html::a('<button type="button" class="btn btn-danger">Удалить</button>',
                                ['/banners'], [
                                    'data-method' => 'POST',
                                    'data-params' => [
                                        'banner_id_del' => $banner->id,]
                                    ,]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach;?>
        <div class="col-lg-3 category-item">
            <a href="<?= \yii\helpers\Url::to(['admin/bannerchange', 'id' => 0]) ?>">
                <div class="category-block" align="center">
                    <img src="images/plus.png" alt="" class="category-image">
                    <div class="row">
                        <span class="category-name">Добавить банер</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
