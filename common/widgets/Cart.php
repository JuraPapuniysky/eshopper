<?php

namespace common\widgets;


use yii\bootstrap\Widget;

class Cart extends Widget
{
    public $products;

    public function run()
    {
        return $this->render('cart_widget',[
            'products' => $this->products,
        ]);
    }
}