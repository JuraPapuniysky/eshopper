<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($model->getCategories(), 'id', 'name')) ?>

    <?= $form->field($model, 'section_id')->dropDownList(ArrayHelper::map($model->getSections(false), 'id', 'name')) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map($model->getBrands(), 'id', 'name')) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 20],
        'preset' => 'basic'
    ]) ?>



    <?= $form->field($model, 'time_stamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    if (!$model->isNewRecord) {
        echo Html::a('Add images',[
            'image/create/',
            'product_id' => $model->id
        ],
            [
                'class' => 'btn btn-primary',
                'href' => '',
            ]);

        echo Html::a('Add size',[
            'size/create/',
            'product_id' => $model->id
        ],
            [
                'class' => 'btn btn-primary',
                'href' => '',
            ]);
    }

    ?>

</div>
