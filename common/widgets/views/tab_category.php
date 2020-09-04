<?php
/* @var $this \yii\web\View */
/* @var $categories \backend\models\Category */
/* @var $products \backend\models\Product */
/* @var $images \backend\models\Image */
/* @var $category_id */


use yii\widgets\Pjax;
use yii\helpers\Html;


?>
<?php Pjax::begin([
    'timeout' =>10000,
    ]); ?>
<div class="category-tab" id="category_tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php $i = 0; foreach($categories as $category) { ?>
                <li <?php if($category_id == $category['id']){ echo 'class="active"';} ?>>
                    <?= Html::a($category['name'], ['index', 'category_id' => $category['id']], []) ?></li>
                <?php $i++; } ?>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="<?= $category_id ?>" >
            <?php foreach ($products as $product){
                $image = $images[$product['id']];
                ?>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?= $image['src'] ?>" alt="" />
                                <h2><?= $product['price'] ?></h2>
                                <p><?= $product['name'] ?></p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div><!--/category-tab-->
<?php Pjax::end(); ?>

    <?php
    $script = <<< JS
$('category_tab').focus(function(event) {
     event.preventDefault();
    });
JS;
    $this->registerJs($script);
    ?>
