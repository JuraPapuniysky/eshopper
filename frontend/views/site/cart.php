<?php
/* @var $products */


use common\widgets\Cart;


?>

<?= Cart::widget(['products' => $products, 'total_price' => $total_price]) ?>
