<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php $count = 0; foreach ($model as $product) {?>
            <?php if($count<3){ ?>
                <div class="item active">
            <?php}else{ ?>
                <div class="item">
            <?php }?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="img-responsive" src="<?= $product['src'] ?>" alt="" />
                                <h2><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['price']*Yii::$app->exchange_rates->coef)?></h2>
                                <p><?= $product['name'] ?></p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <?php $count++; } ?>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
        <pre>
            <?php print_r($model); ?>
        </pre>
</div><!--/recommended_items-->