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

    <?php if(isset($product_section)){
        FeaturesItems::widget(['product_section' => $product_section]);
    }else{
        FeaturesItems::widget(['product_section' => null]);
    } ?>
    <?php if(isset($category_id)) {
        CategoryTab::widget(['category_id' => $category_id]);
    }else{
        CategoryTab::widget();
    }
      ?>
    <?= RecomendedItems::widget() ?>

</div>