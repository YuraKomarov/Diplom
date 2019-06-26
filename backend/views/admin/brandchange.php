<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <?php
    $form = ActiveForm::begin([
        'id' => 'brand-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="product-change-block">
        <div id="popular-category">
            Настройки бренда
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="product-form-item-top">
                    <?= $form->field($brand, 'name') ?>
                </div>
            </div>
            <div class="col-lg-4">
                <span id="popular-category">
                    Изображение
                </span>
                <img src="<?= $brand->picture ?> " alt="" class="product-backend-image" style="width: 80%">

                <?= $form->field($brand, 'image')->fileInput()->label('Изображение') ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>


    <? ActiveForm::end();?>
</div>