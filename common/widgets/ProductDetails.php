<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class ProductDetails extends Widget
{
    public $product;
    public $images;
    public $size = 3;


    public function run()
    {
        return $this->render('product_details',[
           'product' => $this->product,
           'images' => $this->images,
        ]);
    }
}