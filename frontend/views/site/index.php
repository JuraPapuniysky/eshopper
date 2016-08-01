<?php

/* @var $this yii\web\View */


use common\widgets\Category;
use common\widgets\Slider;
use common\widgets\Brands;
use common\widgets\FeaturesItems;
use common\widgets\CategoryTab;
use common\widgets\RecomendedItems;
use backend\models\Product;

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

    <?= FeaturesItems::widget(['category_id' => $category_id,'section_id' => $section_id, 'brand_id' => $brand_id])?>

    <?= RecomendedItems::widget() ?>

</div>