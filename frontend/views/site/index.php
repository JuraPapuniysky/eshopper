<?php

/* @var $this yii\web\View */

use common\widgets\Category;
use common\widgets\Slider;
use common\widgets\Brands;
use common\widgets\FeaturesItems;
use common\widgets\CategoryTab;
use common\widgets\RecomendedItems;

$this->title = 'Home';
?>
<?= Slider::widget() ?>
<div class="col-sm-3">
    <div class="left-sidebar">

        <?= Category::widget() ?>
        <?= Brands::widget() ?>

        
    </div>

</div>
<div class="col-sm-9 ">
    <?= CategoryTab::widget() ?>
    <?= FeaturesItems::widget(['products' => \backend\models\Product::getProductsImages()]) ?>
    <?= RecomendedItems::widget() ?>
</div>