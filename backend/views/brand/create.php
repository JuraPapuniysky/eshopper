<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Brand */
/* @var $category backend\models\Category */
/* @var $gender backend\models\Gender */


$this->title = 'Create Brand';
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'gender' => $gender,
    ]) ?>

</div>
