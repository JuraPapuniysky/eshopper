<?php
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>

        <?php

        foreach ($products as $product){
            $image = $images[$product['id']];
            ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?= $image[0]->src?>" alt="" />
                            <h2><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['price']*Yii::$app->exchange_rates->coef)?></h2>
                            <p><?= $product['name'] ?></p>
                            <?= Html::a(
                                '<i class="fa fa-shopping-cart"></i>Product Details',
                                ['/site/product-details/', 'id' => $product['id'] ],
                                ['class' => 'btn btn-default add-to-cart', 'id' => 'muted_user']
                            );?>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['price']*Yii::$app->exchange_rates->coef)?></h2>
                                <p><?= $product['name'] ?></p>
                                <?= Html::a(
                                    '<i class="fa fa-shopping-cart"></i>Product Details',
                                    ['/site/product-details/', 'id' => $product['id']],
                                    ['class' => 'btn btn-default add-to-cart', 'id' => 'muted_user']
                                );?>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div>

        </div>
    </div><!--features_items-->
<?php echo LinkPager::widget([
'pagination' => $pages,
]); ?>