<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-controll', 'placeholder'=>'First Name']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'form-controll', 'placeholder'=>'Last Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-controll', 'placeholder'=>'Email']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'form-controll', 'placeholder'=>'Phone']) ?>

    <?= $form->field($model, 'addres')->textInput(['maxlength' => true , 'class' => 'form-controll', 'placeholder'=>'Address']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Заказать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
