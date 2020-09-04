<?php
/* @var $product \backend\models\Product */
/* @var $images \backend\models\Image */
/* @var $image \backend\models\Image */
/* @var $brand \backend\models\Brand */
/* @var $modelCart \common\models\cart\Product*/

use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                            <a href="/site/product-details/?id=<?= $product->id?>&imageId=<?= $item['id'] ?>"><img src="<?= str_replace('/images/', '/mini-images/', $item['src']) ?>" alt=""></a>
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
                <img src="" class="newarrival" alt="" />
                <h2><?= $product['name'] ?></h2>
                <p>Web ID: <?= $product['id'] ?></p>
                <img src="/images/product-details/rating.png" alt="" />
								<span>
									<span><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['price']*Yii::$app->exchange_rates->coef)?></span>
                                    <?php Pjax::begin() ?>

                                    <?php $form = ActiveForm::begin() ?>
                                    
                                    <?= $form->field($modelCart, 'quantity')->textInput(['maxlength' => true, 'value' => '1']) ?>
                                    
                                    <?= $form->field($modelCart, 'size_id')->dropDownList(ArrayHelper::map($size, 'id', 'size')) ?>

                                    <?= Html::submitButton('<i class="fa fa-shopping-cart"></i>Добавить в корзину',
                                        ['class' => 'btn btn-fefault cart', 'type' => 'button']
                                    )?>

                                    <?php ActiveForm::end()?>
                                    
                                    <?php Pjax::end() ?>
                                    
								</span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> <?= $brand->name ?></p>
                <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
