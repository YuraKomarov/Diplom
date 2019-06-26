<?php
$this->title = 'Магазин';
?>


<div class="container">
    <div id="categories-title">
        <div class="row">
            <div id="popular-category">
                Все категории
            </div>
        </div>
    </div>

    <div class="categories">
        <div class="row">
            <?php foreach($allCats as $cat): ?>
                <div class="col-lg-3 category-item">
                    <a href="<?= \yii\helpers\Url::to(['admin/category', 'id' => $cat->id]) ?>">
                        <div class="category-block" align="center">
                            <img src="<?= $cat->picture?>" alt="" class="category-image">
                            <div class="row">
                                <span class="category-name"><?= $cat->name?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach;?>
            <div class="col-lg-3 category-item">
                <a href="<?= \yii\helpers\Url::to(['admin/category', 'id' => 0]) ?>">
                    <div class="category-block" align="center">
                        <img src="images/plus.png" alt="" class="category-image">
                        <div class="row">
                            <span class="category-name">Добавить категорию</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>