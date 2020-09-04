<?php

namespace common\widgets;


use yii\bootstrap\Widget;

class Cart extends Widget
{
    public $products;
    public $total_price;

    public function run()
    {
        return $this->render('cart_widget',[
            'products' => $this->products,
            'total_price' => $this->total_price,
        ]);
    }
}