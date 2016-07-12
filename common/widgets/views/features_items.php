<?php
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>

        <?php
        Pjax::begin();
        foreach ($products as $product){ ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="<?= $product['src']?>" alt="" />
                        <h2>$ <?= money_format('%i', $product['price']) ?></h2>
                        <p><?= $product['name'] ?></p>
                        <?= Html::a(
                        '<i class="fa fa-shopping-cart"></i>Product Details',
                        ['/site/product-details/', 'id' => $product['id'] ],
                        ['class' => 'btn btn-default add-to-cart', 'id' => 'muted_user']
                        );?>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$ <?= money_format('%i', $product['price']) ?></h2>
                            <p><?= $product['name'] ?></p>
                            <?= Html::a(
                                '<i class="fa fa-shopping-cart"></i>Product Details',
                                ['/site/product-details/', 'id' => $product['id'] ],
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
        <?php }
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        Pjax::end();
        ?>

    </div><!--features_items-->
