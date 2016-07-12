<?php
/* @var $product \backend\models\Product */
/* @var $images \backend\models\Image */

use backend\models\Image;
use backend\models\Brand;
use yii\imagine\Image as Imagine;

$image = Image::findOne(['product_id' => $product->id, 'description' => '0']);
$brand = Brand::findOne(['id' => $product->id]);

?>

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="<?= $image->src ?>" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <?php $count = 0; foreach($images as $col){ ?>
                        <?php if($count == 0){ ?>
                            <div class="item active">
                                <?php } else {?>
                                    <div class="item">
                                        <?php } ?>
                            <?php foreach ($col as $item) {  ?>
                            <a href=""><img src="<?= $item['src'] ?>" alt=""></a>
                            <?php } ?>
                        </div>
                <?php $count++; } ?>

            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
            <h2><?= $product['name'] ?></h2>
            <p>Web ID: 1089772</p>
            <img src="/images/product-details/rating.png" alt="" />
								<span>
									<span><?= $product['price'] ?></span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> <?= $brand->name ?></p>
            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<pre>
    <?php print_r($images); ?>
</pre>
