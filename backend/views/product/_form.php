<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Brand;
use backend\models\Gender;
use backend\models\Section;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'section_id')->dropDownList(ArrayHelper::map(Section::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(Brand::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'gender_id')->dropDownList(ArrayHelper::map(Gender::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'time_stamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

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
