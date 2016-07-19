<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class ProductDetails extends Widget
{
    public $product;
    public $images;
    public $image;
    public $brand;
    public $size;


    public function run()
    {
        return $this->render('product_details',[
            'product' => $this->product,
            'images' => $this->images,
            'image' => $this->image,
            'brand' => $this->brand,
            'size' => $this->size,
        ]);
    }
}