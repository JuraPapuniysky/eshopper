<?php

use common\widgets\Category;
use common\widgets\Brands;
use common\widgets\BlogList;


/* @var $model common\models\Post */

?>

<div class="col-sm-3">
    <div class="left-sidebar">

        <?= Category::widget() ?>
        <?= Brands::widget() ?>

    </div>

</div>
<div class="col-sm-9 ">

    <?= BlogList::widget(['model' => $model]) ?>
    

</div>