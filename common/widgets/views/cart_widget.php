<?php
use \yii\helpers\Html;
/* @var $products \backend\models\Cart::getCartProduct()*/
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Size</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product){ ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?= $product['product_image'] ?>" alt=""></a>
                        </td>
                        <td class="cart_description">

                            <h4><?= Html::a($product['product_name'], ['/site/product-details/', 'id' => $product['product_id']]) ?></h4>
                            <p>Web ID: <?= $product['product_id'] ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?= $product['product_size'] ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['product_price']*Yii::$app->exchange_rates->coef)?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <?= Html::a('+', ['/site/cart/', 'id' => $product['cart_id'], 'action' => 'quantity_up'], ['class' => 'cart_quantity_up']) ?>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?= $product['product_quantity'] ?>" autocomplete="off" size="2">
                                <?= Html::a('-', ['/site/cart/', 'id' => $product['cart_id'], 'action' => 'quantity_down'], ['class' => 'cart_quantity_down']) ?>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $product['product_total_price']*Yii::$app->exchange_rates->coef)?></p>
                        </td>
                        <td class="cart_delete">
                            <?= Html::a('<i class="fa fa-times"></i>', ['/site/cart/', 'id' => $product['cart_id'], 'action' => 'delete'], ['class' => 'cart_quantity_delete']) ?>
                        </td>
                    </tr>
                <?php }?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="cart_total">
                        <p class="cart_total_price"><?= Yii::$app->exchange_rates->icon.' '.money_format('%i', $total_price*Yii::$app->exchange_rates->coef)?></p></td>
                    <td><?= Html::a('Заказать', ['/site/order-form/'],['class' => 'btn btn-primary']) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
