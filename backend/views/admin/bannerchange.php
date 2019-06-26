<?php
$this->title = 'Изменениe баннера';
?>


<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <?php
    $form = ActiveForm::begin([
        'id' => 'product-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="product-change-block">
        <div id="popular-category">
            Настройки баннера
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="product-form-item-top">
                    <?= $form->field($banner, 'title') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($banner, 'subtitle') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($banner, 'description')->textarea(['rows' => '5']) ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($banner, 'catalog_link') ?>
                </div>
                <div class="product-form-item">
                    <?= $form->field($banner, 'button_lable') ?>
                </div>

            </div>
            <div class="col-lg-4">
                <span id="popular-category">
                    Изображение
                </span>
                <img src="<?= $banner->picture ?> " alt="" class="product-backend-image" style="width: 80%">

                <?= $form->field($banner, 'image')->fileInput()->label('Изображение') ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>



    <? ActiveForm::end();?>
</div>
