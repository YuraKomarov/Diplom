<?php

$this->title = 'Товары';

use yii\helpers\Html;

?>
<div class="container">
    <div class="row">
        <? if($categoryProducts):?>
        <? foreach ($categoryProducts as $product): ?>

                <div class="col-lg-3">
                    <div class="catalog-item-common">
                        <a href="<?= \yii\helpers\Url::to(['diplom/product', 'id' => $product->id]) ?>">
                            <div class="catalog-item" align="center">
                                <div class="catalog-image-block">
                                    <img src="<?= $product->picture ?>" alt="" class="catalog-image">
                                </div>
                                <div class="row">
                                    <span class="catalog-name"><?= $product->name ?><?= $count ?></span>
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
                                    <? if ($product->saleprice): ?>
                                        <span class="catalog-old-price"><?= $product->baseprice ?> руб.</span>
                                        <span class="catalog-price"
                                              id="<?= $product->saleprice ?>"><?= $product->saleprice ?> руб.</span>
                                    <? else: ?>
                                        <span class="catalog-price"
                                              id="<?= $product->baseprice ?>"><?= $product->baseprice ?> руб.</span>
                                    <? endif; ?>
                                </div>
                            </div>
                        </a>
                        <div class="stickers">
                            <div class="row">
                                <? if ($product->hit_status): ?>
                                    <span class="sticker-hit">Хит</span>
                                <? endif; ?>
                                <? if ($product->new_status): ?>
                                    <span class="sticker-new">Новинка</span>
                                <? endif; ?>
                                <? if ($product->sale_status): ?>
                                    <span class="sticker-sale">Акция</span>
                                <? endif; ?>
                            </div>
                        </div>
                        <div class="cart-add-block">
                            <div class="row">
                                <div class="counter-block">
                                    <span class="counter-minus">-</span>
                                    <span class="count">1</span>
                                    <span class="counter-plus">+</span>
                                </div>
                                <div class="add-to-cart-button">
                                    <button type="button" class="btn btn-primary">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <? endforeach; ?>
        <?else:?>
        <div id="popular-category">
            Категория не содержит товаров :(
        </div>
        <?endif;?>
    </div>
</div>

