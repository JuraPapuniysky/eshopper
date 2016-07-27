<?php

use common\widgets\Category;
use common\widgets\Brands;


/* @var $post common\models\Post */
/* @var $comment common\models\Comment */
/* @var $this \yii\base\View */

?>

<div class="col-sm-3">
    <div class="left-sidebar">

        <?= Category::widget() ?>
        <?= Brands::widget() ?>

    </div>

</div>
<div class="col-sm-9 ">

    <?= \common\widgets\Post::widget(['model' => $post]) ?>
    
    <?= $this->render('comment_form', [
        'comment' => $comment,
    ]) ?>

</div>