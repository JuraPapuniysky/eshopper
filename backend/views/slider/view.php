<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slide_name',
            'header',
            'subtitle',
            'text',
            'created_at',
        ],
    ]) ?>



    <?= Html::a('Добавить картинку',
        [
            'slider-image/create',
            'sliderId' => $model->id,
            'type' => 0
        ],
        [
            'class' => 'btn btn-primary'
        ])?>
    <?= Html::a('Добавить прайсин',
        [
            'slider-image/create',
            'sliderId' => $model->id,
            'type' => 1
        ],
        [
            'class' => 'btn btn-primary'
        ])?>

</div>
