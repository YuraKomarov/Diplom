<?php
$this->title = 'Товары';
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


if($categoryId)
{
    $thisurl = '/products?category_id=' . $categoryId;
}
else{
    $thisurl = '/products';
}


?>

<div class="container">


    <div class="row">

        <? foreach ($products as $product): ?>
            <div class="col-lg-3">
                <div class="catalog-item-common">
                    <a href="<?= \yii\helpers\Url::to(['admin/productchange', 'id' => $product->id]) ?>">
                        <div class="catalog-item" align="center">
                            <div class="catalog-image-block">
                                <img src="<?= $product->picture ?>" alt="" class="catalog-image">
                            </div>
                            <div class="row">
                                <span class="catalog-name"><?= $product->name ?></span>
                            </div>
                            <div class="row">
                                <div class="rating-block">
                                    <? for ($i = 0; $i < $product->rating; $i++) : ?>
                                        <span class="rating-item">
                                            <img class="rating-star" src="images/voted-star.png" alt="">
                                        </span>
                                    <? endfor; ?>
                                    <? for ($i = 0; $i < (5 - $product->rating); $i++) : ?>
                                        <span class="rating-item">
                                            <img class="rating-star" src="images/empty-star.png" alt="">
                                        </span>
                                    <? endfor; ?>

                                </div>
                            </div>
                            <div class="row">
                                <span class="catalog-price cat-test"><?= $product->baseprice ?> руб.</span>
                            </div>
                        </div>
                    </a>
                    <div class="stickers">
                        <div class="row">
                            <? if($product->hit_status):?>
                            <span class="sticker-hit">Хит</span>
                            <?endif;?>
                            <? if($product->new_status):?>
                                <span class="sticker-new">Новинка</span>
                            <?endif;?>
                            <? if($product->sale_status):?>
                                <span class="sticker-sale">Акция</span>
                            <?endif;?>

                        </div>
                    </div>
                    <div class="fast-seen">
                        <button type="button" class="btn btn-light fast-seen-link" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Быстрый просмотр
                        </button>
                    </div>
                    <div class="product-delete-block">
                        <div class="row">
                            <div class="delete-product-button"  >
                                <?= Html::a('<button type="button" class="btn btn-danger">Удалить</button>',
                                    [$thisurl], [
                                        'data-method' => 'POST',
                                        'data-params' => [
                                            'product_id_del' => $product->id,]
                                        ,]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>

        <div class="col-lg-3">
            <div class="catalog-item-common">
                <a href="<?= \yii\helpers\Url::to(['admin/productchange', 'id' => 0]) ?>">
                    <div class="catalog-item" align="center" style="padding: 0 0 50px 0">
                        <img src="images/plus.png" alt="" class="catalog-image">
                        <div class="row">
                            <span class="category-name">Добавить товар</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>