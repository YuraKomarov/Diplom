<?php
$this->title = 'Бренды';
?>

<?
use yii\helpers\Html;
?>


<div class="container">
    <div class="row">
        <div id="popular-category" style="margin: 70px 0 70px">
            Все бренды
        </div>
    </div>
    <div class="row">
        <?php foreach($allBrands as $brand): ?>
            <div class="col-lg-3 category-item banner-item">
                <a href="<?= \yii\helpers\Url::to(['admin/brandchange', 'id' => $brand->id]) ?>">
                    <div class="category-block" align="center">
                        <img src="<?= $brand->picture?>" alt="" class="category-image">
                        <div class="row">
                            <span class="category-name"><?= $brand->name?></span>
                        </div>
                    </div>
                </a>
                <div class="banner-delete-block">
                    <div class="row">
                        <div class="delete-banner-button"  >
                            <?= Html::a('<button type="button" class="btn btn-danger">Удалить</button>',
                                ['/brands'], [
                                    'data-method' => 'POST',
                                    'data-params' => [
                                        'brand_id_del' => $brand->id,]
                                    ,]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach;?>
        <div class="col-lg-3 category-item">
            <a href="<?= \yii\helpers\Url::to(['admin/brandchange', 'id' => 0]) ?>">
                <div class="category-block" align="center">
                    <img src="images/plus.png" alt="" class="category-image">
                    <div class="row">
                        <span class="category-name">Добавить бренд</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
