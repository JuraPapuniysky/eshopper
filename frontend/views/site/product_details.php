<?php

/* @var $product backend\models\Product */
/* @var $images backend\models\Image */
/* @var $image backend\models\Image */
/* @var $brand backend\models\Brand */

use common\widgets\ProductDetails;
use common\widgets\Category;
use common\widgets\Brands;
?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <?= Category::widget() ?>
        <?= Brands::widget() ?>
    </div>

</div>
<div class="col-sm-9 ">
    <?= ProductDetails::widget([
        'product' => $product,
        'images' => $images,
        'image' => $image,
        'brand' => $brand,
    ]) ?>
</div>

