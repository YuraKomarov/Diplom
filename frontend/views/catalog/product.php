<?php

$this->title = $product->name;

use yii\helpers\Html;

?>


<div class="container">
    <div class="row">
         <div class="offset-1 col-lg-10">
             <div class="product-detail-title">
                 <?= $product->name?>
             </div>
         </div>
    </div>
    <div class="product-block">
        <div class="row">
            <div class="col-lg-6">
                <div class=" offset-1 col-lg-10">
                    <div class="detail-product-slider">
                        <div class="bd-example">
                            <div id="main-product-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" >
                                        <img src="<?= $product->picture ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= $product->picture1 ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= $product->picture2 ?>" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#main-product-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#main-product-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
