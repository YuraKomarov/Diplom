<?php
$this->title = 'Изменениe товара';
?>

<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$categories = array('null' => ' ');
$brands = array(null => ' ');

foreach ($allCats as $cat) {

    $categories[$cat->id] = $cat->name;
}

foreach ($allBrands as $brand) {

    $brands[$brand->id] = $brand->name;
}
?>


<div class="container">
    <?php
    $form = ActiveForm::begin([
        'id' => 'product-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="product-change-block">
        <div id="popular-category">
            Настройки товара
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="product-form-item-top">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'description')->textarea(['rows' => '5']) ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'parentid')->dropDownList($categories) ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'brand_id')->dropDownList($brands) ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'baseprice') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'saleprice') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'rating') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'hit_status')->checkbox() ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'new_status')->checkbox() ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($model, 'sale_status')->checkbox() ?>
                </div>
            </div>
            <div class="col-lg-4">
                <span id="popular-category">
                    Превью товара
                </span>
                <img src="<?= $model->picture ?> " alt="" class="product-backend-image" style="width: 80%">

                <?= $form->field($model, 'image')->fileInput()->label(false) ?>

                <span id="popular-category">
                    Доплонительные изображения
                </span>
                <img src="<?= $model->picture1 ?> " alt="" class="product-backend-image" style="width: 80%">

                <?= $form->field($model, 'image1')->fileInput()->label(false) ?>

                <img src="<?= $model->picture2 ?> " alt="" class="product-backend-image" style="width: 80%">

                <?= $form->field($model, 'image2')->fileInput()->label(false) ?>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <span id="popular-category">
                    Заполненные свойства
                </span>
                </div>
                <? foreach ($existProps as $prop): ?>
                    <div class="row">
                        <div class="col-lg-4" style="padding-top: 5px">
                            <?= $prop->property->prop_name ?>
                        </div>

                        <div class="col-lg-6">
                            <input type="text" class="form-control property-input" id="propertyInput"
                                   value="<?=$prop->value?>">
                        </div>
                        <div class="col-lg-2">
                            <span class="property-value-action-change" id="<?= $prop->id ?>"></span>
                        </div>

                    </div>
                <? endforeach; ?>
                <div class="row">
                    <span id="popular-category">
                    Не заполненные свойства
                    </span>
                </div>

                <? foreach ($emptyProps as $emptyProp): ?>
                    <div class="row">
                        <div class="col-lg-4" style="padding-top: 5px">
                            <?= $emptyProp->prop_name ?>
                        </div>

                        <div class="col-lg-6">
                            <input type="text" class="form-control property-input" id="propertyInput"
                                   value=" ">
                        </div>
                        <div class="col-lg-2">
                            <span class="product-id" id="<?= $model->id?>"></span>
                            <span class="property-value-action-insert" id="<?= $emptyProp->prop_id ?>"></span>
                        </div>

                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>


    <?php ActiveForm::end() ?>


</div>
