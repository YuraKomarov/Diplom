<?php

$this->title = 'Каталог';

use yii\helpers\Html;

?>

<div class="container">
    <!--    <div class="row">-->
    <!--        <div class="col-lg-3">-->
    <!--            <div class="catalog-filter-block">-->
    <!---->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--    </div>-->

    <div id="categories-title">
        <div class="row">
            <div id="popular-category">
                Все категории
            </div>
        </div>
    </div>
    <div class="categories catalog-categories">
        <div class="row">
            <?php foreach ($allCats as $cat): ?>
                <div class="col-lg-3 category-item">
                    <a href="<?= \yii\helpers\Url::to(['diplom/products', 'category_id' => $cat->id]) ?>">
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