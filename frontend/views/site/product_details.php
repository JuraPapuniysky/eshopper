<?php

/* @var $product backend\models\Product */

use common\widgets\ProductDetails;
?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <?= Category::widget() ?>
        <?= Brands::widget() ?>
    </div>

</div>
<div class="col-sm-9 ">
    <?= ProductDetails::widget(['product' => $product]) ?>
</div>
