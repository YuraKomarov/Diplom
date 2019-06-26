<?php
$model->name ? $this->title = $model->name : $this->title = 'Новая категория';
?>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => 'category-form',
    'options' => ['class' => 'form-horizontal'],
]);

$categories = array();

foreach ($allCats as $cat) {
    if ($cat->id != $model->id) {
        $categories[$cat->id] = $cat->name;
    }
}

$thisurl = 'admin/category?id=' . $model->id;
?>
<div class="container">

    <div class="category-change-block">
        <div id="popular-category">
            Настройки категории
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="category-form-item-top">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="category-form-item">
                    <?= $form->field($model, 'parentid')->dropDownList($categories) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="<?= $model->picture ?> " alt="" class="category-backend-image" style="width: 80%">

                <?= $form->field($model, 'image')->fileInput() ?>
            </div>
            <div class="col-lg-4">
                <a href="<?= \yii\helpers\Url::to(['admin/products', 'category_id' => $model->id]) ?>"
                   class="btn btn-secondary">
                    Товары этой категории
                </a>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>

        </div>
    </div>
</div>
<?php ActiveForm::end() ?>


<div class="container">
    <div class="category-props-block">
        <div class="row">

            <div class="col-lg-6">
                <div id="popular-category">
                    Свойства данной категории
                </div>

                <? if ($catProps): ?>
                    <? foreach ($catProps as $prop): ?>
                        <div class="row">
                            <div class="col-lg-6">

                                <input type="text" class="form-control property-input" id="propertyInput"
                                       value="<?= $prop->prop_name ?>">

                            </div>
                            <div class="col-lg-2">
                                <span class="property-action-change" id="<?=$prop->prop_id?>"></span>
                                <?= Html::a('<span class="property-action-delete"></span>',
                                    [$thisurl], [
                                        'data-method' => 'POST',
                                        'data-params' => [
                                            'prop_id_del' => $prop->prop_id,]
                                        ,]) ?>

                            </div>
                        </div>
                    <? endforeach; ?>
                <? else: ?>
                    <span class="category-name">Категория не содержит собственных свойств</span>
                <? endif; ?>

            </div>

            <div class="col-lg-6">
                <? $propform = ActiveForm::begin([
                    'id' => 'props-form',
                    'options' => ['class' => 'form-horizontal'],
                ]); ?>

                <div class="props-block">
                    <div id="popular-category">
                        Добавить свойство к данной категории
                    </div>
                    <div style="width: 150px">
                        <?= $propform->field($newPropModel, 'prop_name')->label(false) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>

                    </div>
                </div>


                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</div>
