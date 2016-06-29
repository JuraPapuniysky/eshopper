<?php

/* @var $this yii\web\View */

use common\widgets\Category;
use common\widgets\Slider;
use common\widgets\Brands;

$this->title = 'Home';
?>
<div class="col-sm-3">
    <div class="left-sidebar">
        <?= Slider::widget() ?>
        <?= Category::widget() ?>
        <?= Brands::widget() ?>

        
    </div>

</div>
<div class="col-sm-9 padding-right">
    
</div>