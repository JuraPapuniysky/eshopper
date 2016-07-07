<?php

use yii\widgets\Pjax;
/* @var $category \backend\models\Category */

$activeClass = '';
?>

<div class="category-tab"><!--category-tab-->




    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php $i = 0; foreach($data as $key => $products) { ?>

            <li <?php if($i == 0){ $activeClass = $key; echo 'class="active"';} ?>>
                <a href="#<?= strtolower(str_replace(' ', '', $key)) ?>" data-toggle="tab"><?= $key ?></a></li>

            <?php $i++; } ?>
        </ul>
    </div>
    <div class="tab-content">
        <?php foreach($data as $key => $products){ ?>
        <div class="<?php if($activeClass == $key){
            echo 'tab-pane fade active in';
        }else{
            echo 'tab-pane fade';
        }?>" id="<?= strtolower(str_replace(' ', '', $key))?>" >
            <?php foreach ($products as $product){ ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?= $product['src']?>" alt="" />
                            <h2><?= $product['price']?></h2>
                            <p><?= $product['name']?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>

</div><!--/category-tab-->
