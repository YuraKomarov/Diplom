<?php

/* @var $this yii\web\View */

$this->title = 'Главная страница';

use yii\helpers\Html;

?>
<div class="border-wall">
</div>
<div class="container">
    <div class="row slider-block">
        <div class="col-lg-2">
            <div class="row">
                <a href="">
                    <img src="images/sq.jpg" alt="" style="width: 100%">
                </a>
            </div>
            <div class="row">
                <a href="">
                    <img src="images/sq.jpg" alt="" style="width: 100%; margin-top: 20px">
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="bd-example">
                <div id="main-index-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <? foreach ($banners as $banner): ?>
                            <div class="carousel-item">
                                <img src="<?= $banner->picture ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?= $banner->title ?></h5>
                                    <p><?= $banner->subtitle ?></p>
                                    <button type="button" class="btn btn-primary"><?= $banner->button_lable ?></button>
                                </div>
                            </div>
                            <? endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#main-index-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#main-index-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="col-lg-2">
            <div class="row">
                <a href="">
                    <img src="images/sq.jpg" alt="" style="width: 100%">
                </a>
            </div>
            <div class="row">
                <a href="">
                    <img src="images/sq.jpg" alt="" style="width: 100%; margin-top: 20px">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row tizer-block">
        <div class="col-lg-4">
            <div class="tizer-item">
                <img src="images/sertificate.png" alt="">
                <span>
                Гарантия до 5 лет
                </span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="tizer-item">
                <img src="images/refund.png" alt="">
                <span>
                30 дней на обмен и возврат
                </span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="tizer-item">
                <img src="images/delivery.png" alt="">
                <span>
                Удобная доставка
                </span>
            </div>
        </div>
    </div>
</div>

<div class="border-wall">
</div>

<div class="container">
    <div id="categories-title">
        <div class="row">
            <div id="popular-category">
                Популярные категории
            </div>
            <div id="all-categories">
                <a href="#">Все категории</a>
            </div>
        </div>
    </div>

    <div class="categories">
        <div class="row">
            <?php foreach ($cats as $cat): ?>
                <div class="col-lg-3 category-item">
                    <a href="#">
                        <div class="category-block" align="center">
                            <img src="<?= $cat->picture ?>" alt="" class="category-image">
                            <div class="row">
                                <span class="category-name"><?= $cat->name ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<div class="border-wall">
</div>

<div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-new-tab" data-toggle="tab" href="#nav-home" role="tab"
               aria-controls="nav-home" aria-selected="true">Новинки</a>
            <a class="nav-item nav-link" id="nav-sale-tab" data-toggle="tab" href="#nav-profile" role="tab"
               aria-controls="nav-profile" aria-selected="false">Скидки</a>
            <a class="nav-item nav-link" id="nav-hit-tab" data-toggle="tab" href="#nav-contact" role="tab"
               aria-controls="nav-contact" aria-selected="false">Хит продаж</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-new-tab">
            <div class="row">
                <? $count = 0; ?>
                <? foreach ($allProds as $product): ?>

                    <? if (($product->new_status) && ($count < 8)): ?>
                        <div class="col-lg-3">
                            <div class="catalog-item-common">
                                <a href="#">
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
                                <div class="fast-seen">
                                    <button type="button" class="btn btn-light fast-seen-link" data-toggle="modal"
                                            data-target="#modal<?= $product->id ?>">
                                        Быстрый просмотр
                                    </button>
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
                        <? $count++; ?>
                    <? endif; ?>
                <? endforeach; ?>
            </div>


        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-sale-tab">
            <div class="row">
                <? $count = 0; ?>
                <? foreach ($allProds as $product): ?>

                    <? if (($product->sale_status) && ($count < 8)): ?>
                        <div class="col-lg-3">
                            <div class="catalog-item-common">
                                <a href="#">
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
                                <div class="fast-seen">
                                    <button type="button" class="btn btn-light fast-seen-link" data-toggle="modal"
                                            data-target="#modal<?= $product->id ?>">
                                        Быстрый просмотр
                                    </button>
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
                        <? $count++; ?>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-hit-tab">
            <div class="row">
                <? $count = 0; ?>
                <? foreach ($allProds as $product): ?>

                    <? if (($product->hit_status) && ($count < 8)): ?>
                        <div class="col-lg-3">
                            <div class="catalog-item-common">
                                <a href="#">
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
                                            <? endif; ?>                                        </div>
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
                                <div class="fast-seen">
                                    <button type="button" class="btn btn-light fast-seen-link" data-toggle="modal"
                                            data-target="#modal<?= $product->id ?>">
                                        Быстрый просмотр1
                                    </button>
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
                        <? $count++; ?>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        </div>
    </div>

</div>


<? foreach ($allProds as $product): ?>
    <div class="modal fade" id="modal<?= $product->id ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Быстрый просмотр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="modal-image-block">
                                    <div class="modal-image-container">
                                        <img src="<?= $product->picture ?>" alt="" class="modal-image">
                                        <div class="small-images-block" align="center">
                                            <span class="small-image active">
                                                <img src="<?= $product->picture ?>" alt="" class="modal-small-image">
                                            </span>
                                            <? if ($product->picture1): ?>
                                                <span class="small-image">
                                                <img src="<?= $product->picture1 ?>" alt="" class="modal-small-image">
                                            </span>
                                            <? endif; ?>
                                            <? if ($product->picture2): ?>
                                                <span class="small-image">
                                                <img src="<?= $product->picture2 ?>" alt="" class="modal-small-image">
                                            </span>
                                            <? endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="properties-block">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="modal-product-name">
                                                <a href="#">
                                                    <?= $product->name ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="modal-rating-block">
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
                                        </div>
                                        <div class="row">
                                            Артикул: AAkk-<?= $product->id ?>
                                        </div>
                                        <?foreach($productsProps as $property):?>
                                        <?if($property->product_id === $product->id):?>
                                        <div class="row modal-property-row">
                                            <div class="col-lg-6 modal-property">
                                                <?= $property->property->prop_name?>
                                            </div>
                                            <div class="col-lg-6 modal-property-right">
                                                <?= $property->value?>
                                            </div>
                                        </div>
                                        <?endif;?>
                                        <?endforeach;?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                Заказать
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>


<div class="container">
    <div class="brand-slider">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <? foreach($brands as $threeBrands):?>
                <div class="carousel-item">
                    <div class="offset-1 col-lg-10">
                        <div class="row">
                            <?foreach($threeBrands as $brand):?>
                            <div class="col-lg-4">
                                <a href="">
                                    <div class="brand-item" align="center">
                                        <img src="<?= $brand->picture ?>" alt="<?= $brand->name ?>" class="brand-image">
                                    </div>
                                </a>
                            </div>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
                <? endforeach;?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>


