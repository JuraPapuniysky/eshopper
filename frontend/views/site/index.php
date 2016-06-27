<?php

/* @var $this yii\web\View */

use common\widgets\Category;

$this->title = 'Home';
?>
<div class="col-sm-3">

    <?php Category::begin() ?>
    <?php Category::end() ?>

</div>
<div class="col-sm-9 padding-right"></div>